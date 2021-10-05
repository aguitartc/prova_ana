<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function onSymfony\Component\Mailer\HttpKernel\Event\ControllerEvent($event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'Symfony\Component\Mailer\HttpKernel\Event\ControllerEvent' => 'onSymfony\Component\Mailer\HttpKernel\Event\ControllerEvent',
        ];
    }
}
