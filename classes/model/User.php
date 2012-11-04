<?php
namespace model;

use RushPHP\ModelBase;

class User extends ModelBase
{
	public $db_table_name    = "info_user";
	
	public $db_helper_config = "default";
}