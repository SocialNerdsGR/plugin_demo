<?php

namespace App\RegistrationForm\Factory;

use App\RegistrationForm\Dto\RegistrationResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

interface RegistrationResponseFactoryInterface
{
    /**
     * Creates a JSON response from RegistrationResponse.
     */
    public function createJsonResponse(RegistrationResponse $registrationResponse): JsonResponse;
}
