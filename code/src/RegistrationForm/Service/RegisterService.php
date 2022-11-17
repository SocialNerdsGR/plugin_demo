<?php

namespace App\RegistrationForm\Service;

use App\RegistrationForm\Dto\RegistrationRequest;
use App\RegistrationForm\Dto\RegistrationResponse;
use App\RegistrationForm\Plugin\RegistrationFieldHandler\RegistrationFieldHandlerInterface;
use App\RegistrationForm\Plugin\RegistrationFieldHandler\RegistrationFieldHandlersRequest;
use App\RegistrationForm\Repository\UserRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RegisterService implements RegisterServiceInterface
{
    /**
     * Message responses.
     */
    private const ERROR = 'Error';
    private const OK = 'Ok';

    /**
     * Error responses.
     */
    private const ERROR_FIELD_NOT_FOUND = 'Field not found: %s.';

    public function __construct(
        private EventDispatcherInterface $dispatcher,
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function register(RegistrationRequest $registrationRequest): RegistrationResponse
    {
        $registrationFieldHandlersRequest = new RegistrationFieldHandlersRequest();
        $registrationFieldHandlersRequest = $this->dispatcher->dispatch($registrationFieldHandlersRequest, RegistrationFieldHandlersRequest::NAME);

        /** @var RegistrationFieldHandlerInterface[] */
        $handlersArray = [];
        foreach ($registrationFieldHandlersRequest->getRegistrationFieldHandlers() as $registrationFieldHandler) {
            $handlersArray[$registrationFieldHandler::NAME] = $registrationFieldHandler;
        }

        $errors = [];
        foreach ($registrationRequest->fields as $key => $value) {
            if (!in_array($key, array_keys($handlersArray))) {
                $errors[] = sprintf(self::ERROR_FIELD_NOT_FOUND, $key);
                continue;
            }

            $errors = array_merge($errors, $handlersArray[$key]->validate($value));
        }

        if (count($errors)) {
            return new RegistrationResponse(self::ERROR, $errors, false);
        }

        if (!$this->userRepository->save($registrationRequest->fields)) {
            $errors[] = 'User not saved.';
            return new RegistrationResponse(self::ERROR, $errors, false);
        }

        return new RegistrationResponse(self::OK, [], true);
    }
}
