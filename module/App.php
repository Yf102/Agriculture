<?php
/**
 * Created by PhpStorm.
 * User: filiphristov
 * Date: 16/06/2018
 * Time: 17:27
 */

class AppResult
{
	public $status;
	public $error;
	public $description;
	public $data;

	public function __construct($status=200, $error=null, $description='', $data='')
	{
		$this->status = $status;
		$this->error = $error;
		if ($description != null) {
			$this->description = (string) $description;
		}
		$this->setData($data);
	}

	public function to_json()
	{
		return $this;
	}

	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}

	public static function withData($result)
	{
		$o = new AppResult();
		return $o->setData($result);
	}

	public function render() {
		return new \Zend\View\Model\JsonModel(array($this->to_json()));
	}
}

class AgricultureApp
{
	/**
	 * @return \Agriculture\Users[]|null|\Propel\Runtime\Collection\ObjectCollection
	 */
	public function curUser()
	{
		// have loaded the user already?
		if (!empty($this->_curUser)) {
			return $this->_curUser;
		}
		// load user info based on session or API auth
		$email = isset($_SESSION['user_mail']) ? $_SESSION['user_mail'] : null;
		if (empty($email)) {
			return null;
		}


		$this->_curUser = \Agriculture\UsersQuery::create()->filterByUserEmail($email)->findOne();
		return $this->_curUser;
	}

	public function login($email, $password) {
		$user = \Agriculture\UsersQuery::create()->findOneByUserEmail($email);

		// check for empty user
		if (empty($user)) {
			// Attempt to login with non-existing email
			return false;
		}

		// check for password mismatch
		if($password !== $user->getUserPass()) {
			// Attempt to login with wrong password
			return false;
		}

		// start session for user
//		session_start();
		$_SESSION['user_mail'] = $email;
		$_SESSION['user_id'] = $user->getId();

		// Session start for user;
		return true;
	}

	public function logout() {
//		session_start();
		session_unset();

		return true;
	}

	public function test() {
		echo "test";
	}
}
