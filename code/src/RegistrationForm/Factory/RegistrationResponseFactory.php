<?php

namespace App\RegistrationForm\Factory;

use App\RegistrationForm\Dto\RegistrationRequest;
use App\RegistrationForm\Dto\RegistrationResponse;
use App\RegistrationForm\Exception\InvalidJsonException;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegistrationResponseFactory implements RegistrationResponseFactoryInterface
{
    private const MESSAGE = 'message';
    private const ERRORS = 'errors';
    private const STATUS = 'status';


    public function createJsonResponse(RegistrationResponse $registrationResponse): JsonResponse
    {
        $response = [
            self::MESSAGE => $registrationResponse->message,
            self::ERRORS => $registrationResponse->errors,
            self::STATUS => $registrationResponse->status,
        ];
        return new JsonResponse(
            $response,
            $registrationResponse->status === true ? JsonResponse::HTTP_CREATED : JsonResponse::HTTP_BAD_REQUEST
        );
    }
}
