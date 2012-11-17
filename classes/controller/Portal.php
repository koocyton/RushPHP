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
		return new view\PHPView("user_portal_2.php", array("wess"=>$this->wess, "server_time"=>NOW_TIME, "server_date"=>NOW_DATE));
	}

	/*
	 * 用户的 APP LIST
	 */
	public function apps()
	{
		$user_service = service\User::getSingleton();
		$user_apps = $user_service->getUserAppsInfo($this->user_id);
		return new view\JSView($_GET["callback"], $user_apps);
	}
}