<?php
namespace controller;

use RushPHP\ControllerBase;
use RushPHP\view;
use common\Utils;
use service;

class AppController extends ControllerBase
{
	public function beforeFilter()
	{
		$login_service = service\Login::getSingleton();
		// echo $login_service->checkSession();exit;
		if (!$login_service->checkSession())
		{
			Utils::location("?act=index.login");
		}
	}

	public function afterFilter() {}
}