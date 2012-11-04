<?php
namespace RushPHP\helper;

use RushPHP\helper\DBConnect;
use RushPHP\Singleton;

class DBConnectManager
{
	public static $connects = array();

	public static function getConnect($connect_config)
	{
		$connect_name = $connect_config["name"];

		if (!self::$connects[$connect_name])
		{
			$connecter = "RushPHP\\helper\\DBConnect\\" . $connect_config["connect"] . "Connect";

			self::$connects[$connect_name] = new $connecter($connect_config);
		}

		return self::$connects[$connect_name];
	}
}

class DBHelper
{
	private $connect = null;

	static public function getSingleton($config_name)
	{
		$_t = \DBHelperConfigure::$$config_name;
		$_t["name"] = $config_name;
		\DBHelperConfigure::$$config_name= $_t;
		return DBConnectManager::getConnect(\DBHelperConfigure::$$config_name);
	}
}