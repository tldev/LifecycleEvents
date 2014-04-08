<?php

namespace LifecycleEvents\Event;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Zend\EventManager\EventManagerInterface;

class LifecycleEventSubscriber implements EventSubscriber {

    /**
     * @var \Zend\EventManager\EventManagerInterface
     */
    protected $event_manager;

    protected $events = array(
        Events::preRemove => true,
        Events::postRemove => true,
        Events::prePersist => true,
        Events::postPersist => true,
        Events::preUpdate => true,
        Events::postUpdate => true,
        Events::postLoad => true,
        Events::loadClassMetadata => true,
        Events::preFlush => true,
        Events::onFlush => true,
        Events::postFlush => true,
        Events::onClear => true
    );


    public function __construct(EventManagerInterface $event_manager) {
        $this->event_manager = $event_manager;
        $this->event_manager->addIdentifiers(array(
            'Doctrine\ORM\EntityManager'
        ));
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return array
     */
    public function getSubscribedEvents()
    {
        return array_keys($this->events);
    }

    public function __call($event, $arguments) {
        $eventArgs = $arguments[0];
        $this->event_manager->trigger($event, get_class($eventArgs->getEntityManager()), $eventArgs);
    }
}