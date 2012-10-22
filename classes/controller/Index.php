<?php
namespace controller;

use RushPHP\ControllerBase;
use RushPHP\view;

use service;

class Index extends ControllerBase
{
	public function beforeFilter() {}

	public function afterFilter() {}

	public function main()
	{
        $login_service = service\LoginService::getSingleton();

		if ($login_service->getLoginUserId())
		{
			return new view\PHPView("location.php", array("get"=>array("act"=>"User.portal")));
		}

		return new view\PHPView("index_login.php");
	}

	public function login()
	{
		$login_name = $_POST["login_name"];
		$login_pass = $_POST['login_pass'];

        $login_service = service\LoginService::getSingleton();
		$login_user_id = $login_service->userLogin($login_name, $login_pass);

		if (empty($login_user_id))
		{
			return new view\PHPView("index_login.php", array("message"=>"用户名或密码错误"));
		}

		return new view\PHPView("location.php", array("get"=>array("act"=>"User.portal", "u"=>"0")));
	}

	public function logout()
	{
        $login_service = service\LoginService::getSingleton();
		$login_service->logout();
		return new view\PHPView("index_main.php");
	}
}