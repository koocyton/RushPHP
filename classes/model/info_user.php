<?php
namespace model;

use RushPHP\ModelBase;

class info_user extends ModelBase
{
	public $id = "";

	public $login_name = "";

	public $login_pass = "";

	public $user_nick  = "";

	public function __construct()
	{
		$this->set_connect = array("liuyi");
	}
}