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
		return new view\PHPView("user_portal_2.php", array("wess"=>$this->wess));
	}

	/*
	 * 用户的 APP LIST
	 */
	public function apps()
	{
		$data = "";
		return new view\JSView("UserApps", $data);
	}
}