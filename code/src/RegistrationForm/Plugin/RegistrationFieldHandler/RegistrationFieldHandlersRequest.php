<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

use Symfony\Contracts\EventDispatcher\Event;

class RegistrationFieldHandlersRequest extends Event
{
    public const NAME = 'registration.fields.request';

    public function __construct(
        private array $registrationFieldHandlers = [],
    ) {
    }

    public function addRegistrationFieldHandler(RegistrationFieldHandlerInterface $registrationFieldHandler) {
        $this->registrationFieldHandlers[] = $registrationFieldHandler;
    }

    public function getRegistrationFieldHandlers() {
        return $this->registrationFieldHandlers;
    }
}