<?php
/**
 * Created by PhpStorm.
 * User: filiphristov
 * Date: 17/06/2018
 * Time: 11:26
 */

namespace App\Controller;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class AuthController extends AbstractActionController
{
	protected $app;

	/**
	 * AuthController constructor.
	 */
	public function __construct()
	{
		$this->app = new \AgricultureApp();
	}

	public function loginAction()
	{
		return array();
	}

	public function onDispatch(MvcEvent $e)
	{
		if(is_null($this->app->curUser())) {
//			return $this->redirect()->toRoute('login');
		}

		return parent::onDispatch($e);
	}

	public function authenticateAction() {
		/* @param $request \Zend\Stdlib\Request */
		$request = $this->getRequest();
		if ($request->isPost()){
			if($this->app->login($request->getPost('email'), $request->getPost('password'))) {
				return $this->redirect()->toRoute('login');
			}
		}

		return $this->redirect()->toRoute('login');
	}

	public function logoutAction()
	{
		$this->app->logout();
		return $this->redirect()->toRoute('login');
	}
}
