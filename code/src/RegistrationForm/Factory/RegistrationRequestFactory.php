<?php

namespace App\RegistrationForm\Factory;

use App\RegistrationForm\Dto\RegistrationRequest;
use App\RegistrationForm\Exception\InvalidJsonException;
use Symfony\Component\HttpFoundation\Request;

class RegistrationRequestFactory implements RegistrationRequestFactoryInterface
{
    private const ERROR_INVALID_JSON = 'Invalid JSON format.';

    public function create(Request $request): RegistrationRequest
    {
        $contentArray = json_decode($request->getContent(), true);
        if (\JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidJsonException(self::ERROR_INVALID_JSON);
        }

        return new RegistrationRequest($contentArray);
    }
}
