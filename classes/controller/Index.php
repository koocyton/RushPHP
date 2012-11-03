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
        $login_service = service\Login::getSingleton();

		if ($login_service->checkSession())
		{
			return new view\PHPView("location.php", "user/portal");
		}

		return new view\PHPView("index_login.php");
	}

	public function login()
	{
		$account       = $_POST["account"];
		$password      = $_POST['password'];
		$fail_return   = array("code"=>"", "message"=>"");
        $login_service = service\Login::getSingleton();
      
		$login_result  = $login_service->login($account, $password);
		
		switch($login_result)
		{
			case 1:
				$fail_return = array("code"=>"1", "message"=>"未注册过的账号");
				break;
			case 2:
				$fail_return = array("code"=>"2", "message"=>"输入的密码不正确");
				break;
			case 3:
				$fail_return = array("code"=>"3", "message"=>"账号应该是一个邮箱");
				break;
			case 4:
				$fail_return = array("code"=>"4", "message"=>"密码不能为空");
				break;
			default:
				$fail_return = array("code"=>"9", "message"=>"未知的错误，请稍后重试");
				break;
		}

		if ($login_result!="0")
		{
			return new view\PHPView("index_login.php", $fail_return);
		}
		return new view\PHPView("location.php", "user/portal");
	}

	public function logout()
	{
        $login_service = service\Login::getSingleton();
		$login_service->logout();
		return new view\PHPView("location.php", "index/main");
	}
}