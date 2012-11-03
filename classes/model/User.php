<?php
namespace model;

use RushPHP\ModelBase;

class User extends ModelBase
{
	public $id = "";

	public $account = "";

	public $login_pass = "";

	public $user_nick  = "";

	public function __construct()
	{
		$this->set_connect = array("liuyi");
	}
}