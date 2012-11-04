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

		if (!self::$connect[$connect_name])
		{
			$connecter = "DBConnect\\" . $connect_config["name"] . "Connect";

			self::$connect[$connect_name] = new $connecter($connect_config);
		}

		return self::$connect[$connect_name];
	}
}

class DBHelper
{
	private $connect = null;

	static public function getSingleton($config_name)
	{
		$db_helper = Singleton::get("RushPHP\\helper\\DBHelper");
		$db_helper->setConnect = DBConnectManager::getConnect($config_name, \DBHelperConfigure::$config_name);
		return $db_helper;
	}

    public function __construct()
	{
	}

    public static function setPdo($dsn_info)
    {
		$this->pdo = new \PDO(
			$dsn_info['scheme'].':host='.$dsn_info['host'].';port='.$dsn_info['port'].';dbname='.$dsn_info['dbname'], $dsn_info['username'], $dsn_info['password'], 
			array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$dsn_info['charset']."';",
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
			)
		);
	}
}