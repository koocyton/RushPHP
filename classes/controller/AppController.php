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

		if (!$login_service->getUserId())
		{
			Utils::location("/?msg=" . urlencode("登陆超时，请重新登陆"));
		}
	}

	public function afterFilter() {}
}