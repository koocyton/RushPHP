<?php
namespace model;

use RushPHP\ModelBase;

class User extends ModelBase
{
	public $table  = "info_user";
	
	public $config = "default";
	
	public $cache  = "default";
}