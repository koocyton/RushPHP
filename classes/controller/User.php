<?php
namespace controller;

use RushPHP\view;
use service;

class User extends AppController
{
	public function portal()
	{
		$login_service = service\Login::getSingleton();
		$wess = $login_service->getSession();
		return new view\PHPView("user_portal_2.php", array("wess"=>$wess));
	}
}