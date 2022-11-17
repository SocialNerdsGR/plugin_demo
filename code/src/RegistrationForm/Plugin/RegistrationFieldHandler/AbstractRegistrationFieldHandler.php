<?php

namespace App\RegistrationForm\Plugin\RegistrationFieldHandler;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

abstract class AbstractRegistrationFieldHandler implements EventSubscriberInterface, RegistrationFieldHandlerInterface
{
    public const NAME = 'abstract';

    public static function getSubscribedEvents()
    {
        return [
            RegistrationFieldHandlersRequest::NAME => 'onRegistrationFieldHandlersRequest',
        ];
    }
}