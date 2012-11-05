<?php
namespace controller;

use RushPHP\ControllerBase;
use RushPHP\view;
use common\Utils;
use service;

class User extends AppController
{
	public function portal()
	{
		return new view\PHPView("user_portal.php");
	}
}