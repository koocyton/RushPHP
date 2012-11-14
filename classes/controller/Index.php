<?php
namespace controller;

use RushPHP\ControllerBase;
use RushPHP\view;
use common\Utils;
use service;

class Index extends ControllerBase
{
	public function beforeFilter() {}

	public function afterFilter() {}

	public function main()
	{
        $login_service = service\Login::getSingleton();

		if ($login_service->getUserId()) { Utils::location("?act=portal"); }

		return new view\PHPView("index_main.php", $_GET);
	}

	public function login()
	{
		$login_service = service\Login::getSingleton();
		
		if ($login_service->getUserId()) { Utils::location("?act=user.portal"); }

		$account       = empty($_POST['account'])     ? "" : $_POST["account"];
		$password      = empty($_POST['password'])    ? "" : $_POST['password'];
		$remember_me   = empty($_POST['remember_me']) ? 0  : 1;

		$fail_return   = array("code"=>"", "message"=>"");

        $login_service = service\Login::getSingleton();
      
		$login_result  = $login_service->login($account, $password, $remember_me);

		switch($login_result)
		{
			case 1:
				$fail_return = array("code"=>"1", "message"=>"请输入账号");
				break;
			case 2:
				$fail_return = array("code"=>"2", "message"=>"请输入密码");
				break;
			case 3:
				$fail_return = array("code"=>"3", "message"=>"未注册过的账号");
				break;
			case 4:
				$fail_return = array("code"=>"4", "message"=>"输入的密码不正确");
				break;
			default:
				$fail_return = array("code"=>"9", "message"=>"服务忙，请稍后重试");
				break;
		}
		if ($login_result!="0")
		{
			$_POST["msg"] = $fail_return["message"];
			return new view\PHPView("index_main.php", $_POST);
			// Utils::location("?msg=".urlencode($fail_return["message"]));
		}
		Utils::location("?act=portal");
	}

	public function logout()
	{
        $login_service = service\Login::getSingleton();
		$login_service->logout();
		Utils::location("/");
	}
}