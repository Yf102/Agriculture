<?php
/**
 * Created by PhpStorm.
 * User: filiphristov
 * Date: 17/06/2018
 * Time: 14:27
 */

namespace App\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class ParcelController extends AbstractActionController
{
	protected $app;

	public function __construct()
	{
		$this->app = new \AgricultureApp();
	}

	public function addAction()
	{
		return array();
	}

	public function onDispatch(MvcEvent $e)
	{
		if(is_null($this->app->curUser())) {
			return $this->redirect()->toRoute('login');
		}

		return parent::onDispatch($e);
	}
}
