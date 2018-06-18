<?php

namespace App;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;

class Module
{
	private $app;
	public function init(ModuleManager $moduleManager) {
		session_start();

		$this->app = new \AgricultureApp();

//		if(is_null($this->app->curUser())) {
////			$this->redirect()->toRoute('login');
//		}
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
