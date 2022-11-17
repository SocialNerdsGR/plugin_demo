<?php

namespace App\RegistrationForm\Controller\V1;

use App\RegistrationForm\Exception\InvalidJsonException;
use App\RegistrationForm\Factory\RegistrationRequestFactoryInterface;
use App\RegistrationForm\Factory\RegistrationResponseFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\RegistrationForm\Service\RegisterServiceInterface;

class RegisterController extends AbstractController
{
    #[Route('/api/v1/register', name: 'app_register', methods: ['POST'])]
    public function register(Request $request, RegistrationRequestFactoryInterface $registrationRequestFactory, RegistrationResponseFactoryInterface $registrationResponseFactory, RegisterServiceInterface $registerService): JsonResponse
    {
        try {
            $registrationRequest = $registrationRequestFactory->create($request);
            $registrationResponse = $registerService->register($registrationRequest);
            return $registrationResponseFactory->createJsonResponse($registrationResponse);
        } catch (InvalidJsonException $e) {
            return $this->json(
                [
                    'errors' => [$e->getMessage()],
                    'status' => false,
                ],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }
    }
}
