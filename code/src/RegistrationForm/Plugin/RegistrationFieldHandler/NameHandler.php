<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

class NameHandler extends AbstractRegistrationFieldHandler
{
    public const NAME = 'name';

    public function onRegistrationFieldHandlersRequest(RegistrationFieldHandlersRequest $registrationFieldHandlersRequest)
    {
        $registrationFieldHandlersRequest->addRegistrationFieldHandler($this);
    }

    public function validate($value): array
    {
        return [];
    }
}