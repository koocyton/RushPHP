<?php
namespace controller;

use RushPHP\ControllerBase;
use RushPHP\view;
use common\Utils;
use service;

class AppController extends ControllerBase
{
	public $user_id = 0;

	public $wess = 0;

	public function beforeFilter()
	{
		$login_service = service\Login::getSingleton();

		$this->user_id = $login_service->getUserId();

		if (!$this->user_id)
		{
			Utils::location("/?msg=" . urlencode("登陆超时，请重新登陆"));
		}

		$this->wess = $login_service->getSession();
	}

	public function afterFilter() {}
}