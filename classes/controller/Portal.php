<?php
namespace controller;

use RushPHP\view;
use service;

class Portal extends AppController
{
	/*
	 * 用户的主界面
	 */
	public function main()
	{
		$login_service = service\Login::getSingleton();
		$wess = $login_service->getSession();
		return new view\PHPView("user_portal_2.php", array("wess"=>$wess));
	}
	
	/*
	 * 用户的 APP LIST
	 */
	public function apps()
	{
		$login_service = service\Login::getSingleton();
		$wess = $login_service->getUserId();
		return new view\PHPView("user_portal_2.php", array("wess"=>$wess));
	}
}