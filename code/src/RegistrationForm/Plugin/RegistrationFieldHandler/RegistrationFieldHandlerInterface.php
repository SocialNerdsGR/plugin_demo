<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

interface RegistrationFieldHandlerInterface
{
    /**
     * Runs for every subscriber when a RegistrationFieldHandlersRequest event is dispatched.
     */
    public function onRegistrationFieldHandlersRequest(RegistrationFieldHandlersRequest $registrationFieldHandlersRequest);

    /**
     * Validates value against its handler.
     * 
     * @param mixed $value It can be int, string, array
     * 
     * @return FieldValidationResponse[]
     */
    public function validate($value): array;
}