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
						'controller' => 'Api\Index',
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
								'controller' => 'Api\Parcel',
							),
						),
					),
					'tractor' => array(
						'type'    => Segment::class,
						'options' => array(
							'route'    => '/tractor[/:id]',
							'constraints' => array(
								'id'     => '[0-9]+',
							),
							'defaults' => array(
								'controller' => 'Api\Tractor',
							),
						),
					),
					'processing' => array(
						'type'    => Segment::class,
						'options' => array(
							'route'    => '/processing[/:id]',
							'constraints' => array(
								'id'     => '[0-9]+',
							),
							'defaults' => array(
								'controller' => 'Api\Processed',
							),
						),
					),
				),
			),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Api\Index' => \Api\Controller\IndexController::class,
            'Api\Parcel' => \Api\Controller\ParcelController::class,
			'Api\Tractor' => \Api\Controller\TractorController::class,
			'Api\Processed' => \Api\Controller\ProcessedController::class
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
