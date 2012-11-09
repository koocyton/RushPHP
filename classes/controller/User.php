<?php
namespace controller;

use RushPHP\view;

class User extends AppController
{
	public function portal()
	{
		return new view\PHPView("user_portal_2.php");
	}
}