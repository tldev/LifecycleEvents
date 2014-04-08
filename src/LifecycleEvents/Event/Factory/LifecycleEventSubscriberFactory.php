<?php

namespace LifecycleEvents\Event\Factory;


use LifecycleEvents\Event\LifecycleEventSubscriber;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LifecycleEventSubscriberFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var  \Zend\EventManager\EventManager $event_manager */
        $event_manager = $serviceLocator->get('EventManager');
        return new LifecycleEventSubscriber($event_manager);
    }
}