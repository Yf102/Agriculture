<?php
/**
 * Created by PhpStorm.
 * User: filiphristov
 * Date: 16/06/2018
 * Time: 22:10
 */

return array(
	'router' => array(
		'routes' => array(
			'login' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/login',
					'defaults' => array(
						'__NAMESPACE__' => 'App\Controller',
						'controller'    => 'Auth',
						'action'        => 'login',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'process' => array(
						'type'    => \Zend\Router\Http\Segment::class,
						'options' => array(
							'route'    => '/[:action]',
							'constraints' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
							),
						),
					),
				),
			),
			'app' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/app',
					'defaults' => array(
						'__NAMESPACE__' => 'App\Controller',
						'controller'    => 'Parcel',
						'action' 		=> 'index'
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'parcel' => array(
						'type'    => \Zend\Router\Http\Segment::class,
						'options' => array(
							'route'    => '/parcel[/:action]',
							'constraints' => array(
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
								'__NAMESPACE__' => 'App\Controller',
								'controller' => 'Parcel',
								'action'        => 'index',
							),
						),
					),
					'tractor' => array(
						'type'    => \Zend\Router\Http\Segment::class,
						'options' => array(
							'route'    => '/tractor[/:action]',
							'constraints' => array(
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
								'__NAMESPACE__' => 'App\Controller',
								'controller' => 'Tractor',
								'action'        => 'index',
							),
						),
					),
					'processing' => array(
						'type'    => \Zend\Router\Http\Segment::class,
						'options' => array(
							'route'    => '/processing/[:id[/:action]]',
							'constraints' => array(
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
								'__NAMESPACE__' => 'App\Controller',
								'controller' => 'Processing',
								'action'        => 'index',
							),
						),
					),
				),
			)
		),
	),
	'controllers' => array(
		'invokables' => array(
			'App\Controller\Auth'    => 'App\Controller\AuthController',
			'App\Controller\Parcel'	 => 'App\Controller\ParcelController',
			'App\Controller\Processing' => 'App\Controller\ProcessingController',
			'App\Controller\Tractor' => 'App\Controller\TractorController'
		),
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
		'display_exceptions'       => true,
		'doctype'                  => 'HTML5',
		'not_found_template'       => 'error/404',
		'exception_template'       => 'error/index',
		'template_map' => array(
			'app/layout'           => __DIR__ . '/../view/app/layout.phtml',
			'app/index' => __DIR__ . '/../view/app/index.phtml',
			'error/404'               => __DIR__ . '/../view/error/404.phtml',
			'error/index'             => __DIR__ . '/../view/error/index.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	)
);
