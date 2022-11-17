<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

class FieldValidationResponse
{
    public function __construct(
        public readonly string $message,
        public readonly bool $status,
    )
    {
    }
}