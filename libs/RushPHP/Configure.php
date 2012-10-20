<?php
namespace RaftPHP;

class Configure
{
	public static function initialize()
	{
		self::setTimezone();
		self::includeFile();
	}

	public static function includeFile()
	{
		$configFiles = glob(CONF_DIR.DIRECTORY_SEPARATOR.'*.php');
	    foreach ($configFiles as $configFile) 
	    {
            require_once $configFile;
        }
	}

	private static function setTimezone()
	{
		if (!defined('TIME_ZONE')) define('TIME_ZONE', 'Asia/Shanghai');

		date_default_timezone_set(TIME_ZONE);
	}
}