<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

class AgeHandler extends AbstractRegistrationFieldHandler
{
    public const NAME = 'age';

    private const CONSTRAINT_MINIMUM_AGE = 21;

    private const ERROR_MINIMUM_AGE = 'Age must be equal or more than 21.';


    public function onRegistrationFieldHandlersRequest(RegistrationFieldHandlersRequest $registrationFieldHandlersRequest)
    {
        $registrationFieldHandlersRequest->addRegistrationFieldHandler($this);
    }

    public function validate($value): array
    {
        $errors = [];
        if ($value < self::CONSTRAINT_MINIMUM_AGE) {
            $errors[] = self::ERROR_MINIMUM_AGE;
        }
        return $errors;
    }
}
