<?php

namespace App;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;

class Module
{
	private $app;
	public function init(ModuleManager $moduleManager) {
		session_start();

		$this->app = new \AgricultureApp();
	}

	public function onBootstrap(MvcEvent $e) {
		$viewModel = $e->getApplication()->getMvcEvent()->getViewModel();
		$viewModel->app = $this->app;
	}

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }
}
