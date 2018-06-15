<?php

use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => Literal::class,
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Api\Controller\Index',
                    ),
                ),
            ),
            'album' => array(
                'type'    => Segment::class,
                'options' => array(
                    'route'    => '/album[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Api\Controller\Album',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\Index' => 'Api\Controller\IndexController',
            'Api\Controller\Album' => 'Api\Controller\AlbumController',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
