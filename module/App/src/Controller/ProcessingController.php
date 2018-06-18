<?php
/**
 * Created by PhpStorm.
 * User: filiphristov
 * Date: 18/06/2018
 * Time: 09:07
 */

namespace App\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class ProcessingController extends AbstractActionController
{
	protected $app;

	public function __construct()
	{
		$this->app = new \AgricultureApp();
	}

	public function addAction() {
		return array(
			"parcelId" => $this->getEvent()->getRouteMatch()->getParams()['id']
		);
	}

	public function onDispatch(MvcEvent $e)
	{
		if(is_null($this->app->curUser())) {
			return $this->redirect()->toRoute('login');
		}

		return parent::onDispatch($e);
	}
}
