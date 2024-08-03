<?php

// src/EventSubscriber/JaxonSubscriber.php
namespace App\EventSubscriber;

use App\Controller\DemoController;
use App\Controller\JaxonController;
use Jaxon\Symfony\App\Jaxon;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

use function is_array;

class JaxonSubscriber implements EventSubscriberInterface
{
    public function __construct(private Jaxon $jaxon)
    {}

    public function onKernelController(ControllerEvent $event)
    {
        $controller = $event->getController();

        // when a controller class defines multiple action methods, the controller
        // is returned as [$controllerInstance, 'methodName']
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        if ($controller instanceof JaxonController || $controller instanceof DemoController) {
            $this->jaxon->setup();
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
