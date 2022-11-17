<?php

namespace App\RegistrationForm\Dto;

class RegistrationResponse
{
    public function __construct(
        public readonly string $message,
        public readonly array $errors,
        public readonly bool $status
    )
    {
    }
}