<?php

namespace App\RegistrationForm\Factory;

use App\RegistrationForm\Dto\RegistrationRequest;
use Symfony\Component\HttpFoundation\Request;

interface RegistrationRequestFactoryInterface
{
    /**
     * Creates a registration request from an HTTP request.
     */
    public function create(Request $request): RegistrationRequest;
}