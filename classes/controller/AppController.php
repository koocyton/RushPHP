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
		if (!$login_service->checkSession())
		{
			Utils::location("?act=index.login");
		}
		
	}

	public function afterFilter() {}
}