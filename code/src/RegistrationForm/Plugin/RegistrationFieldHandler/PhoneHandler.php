<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

class PhoneHandler extends AbstractRegistrationFieldHandler
{
    public const NAME = 'phone';

    private const ERROR_MUST_BE_STRING = 'Phone number must be string.';


    public function onRegistrationFieldHandlersRequest(RegistrationFieldHandlersRequest $registrationFieldHandlersRequest)
    {
        $registrationFieldHandlersRequest->addRegistrationFieldHandler($this);
    }

    public function validate($value): array
    {
        $errors = [];
        if (!is_string($value)) {
            $errors[] = self::ERROR_MUST_BE_STRING;
        }
        return $errors;
    }
}
