<?php
namespace model;

use RushPHP\ModelBase;

class User extends ModelBase
{
	public static $dbhelper_config = "default";

	public static $db_table        = "info_user";
}