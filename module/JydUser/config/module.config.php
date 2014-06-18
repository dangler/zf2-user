<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'JydUser\Controller\Index' => 'JydUser\Controller\IndexController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'JydUser\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'user' => __DIR__ . '/../view',
        )
    ),

    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            'JydUser_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/JydUser/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'JydUser\Entity' => 'JydUser_driver'
                )
            )
        )
    )
);