<?php

namespace App\RegistrationForm\Dto;

class RegistrationRequest
{
    public function __construct(
        public readonly array $fields,
    ) {
    }
}
