<?php

namespace App\RegistrationForm\Service;

use App\RegistrationForm\Dto\RegistrationRequest;
use App\RegistrationForm\Dto\RegistrationResponse;

interface RegisterServiceInterface
{
    /**
     * Registers a new user.
     */
    public function register(RegistrationRequest $registrationRequest): RegistrationResponse;
}