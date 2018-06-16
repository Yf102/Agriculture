<?php

use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;

return array(
    'router' => array(
        'routes' => array(
        	'api' => array(
        		'type' => Literal::class,
				'options' => array(
					'route'    => '/api',
					'defaults' => array(
						'controller' => \Api\Controller\IndexController::class,
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'parcel' => array(
						'type'    => Segment::class,
						'options' => array(
							'route'    => '/parcel[/:id]',
							'constraints' => array(
								'id'     => '[0-9]+',
							),
							'defaults' => array(
								'controller' => \Api\Controller\ParcelController::class,
							),
						),
					),
				),
			),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\Index' => 'Api\Controller\IndexController',
            'Api\Controller\Album' => 'Api\Controller\ParcelController',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
