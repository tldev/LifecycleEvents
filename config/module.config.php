<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'LifecycleEvents\Event\LifecycleEventSubscriber'
            => 'LifecycleEvents\Event\Factory\LifecycleEventSubscriberFactory'
        )
    ),
    'doctrine' => array(
        'eventmanager' => array(
            'orm_default' => array(
                'subscribers' => array(
                    'LifecycleEvents\Event\LifecycleEventSubscriber'
                    => 'LifecycleEvents\Event\LifecycleEventSubscriber'
                )
            )
        )
    )
);