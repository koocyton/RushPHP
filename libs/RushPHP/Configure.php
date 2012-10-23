<?php
namespace RushPHP;

/*
 * 界面上，登陆和注册位置 ，显示用户名的地方，都用繁体的邮箱
 * 登陸 ： 郵箱   密碼
 * 註冊 ： 請輸入郵箱   輸入密碼    確認密碼
 */
class Configure
{
	public static function initialize()
	{
		self::setRuntimeDefine();

		self::requireGlobalConfig();

		self::requireWebSiteConfig();

		self::setTimezone();
	}
	
	public static function setRuntimeDefine()
	{
		// 配置默认域
		$rush_runtime_domain = $_SERVER["SERVER_NAME"];

		if ( !empty($_SERVER["argv"]) )
		{
			$rush_runtime_commond = join($_SERVER["argv"]);
			
			if (preg_match("/--domain=(.+?)/", $rush_runtime_commond, $matchs))
			{
				$rush_runtime_domain = $matchs[1];
			}
			else
			{
				$rush_runtime_commond = "default";
			}
		}

		define( "RUSH_RUNTIME_DOMAIN", $rush_runtime_domain );
	}

	private static function requireGlobalConfig()
	{
		$global_config_files = glob( RUSH_SITE_DIR . DS . '*.php' );
		
	    foreach ( $global_config_files as $global_config_file ) 
	    {
            require $global_config_file;
        }
	}

	private static function requireWebSiteConfig()
	{
		$website_config_files = glob( RUSH_SITE_DIR . DS . RUSH_RUNTIME_DOMAIN . DS . '*.php' );

	    foreach ( $website_config_files as $website_config_file ) 
	    {
            require $website_config_file;
        }
		
	}

	private static function setTimezone()
	{
		if (!defined('TIME_ZONE')) define('TIME_ZONE', 'Asia/Shanghai');
	
		date_default_timezone_set(TIME_ZONE);
	}
}

Configure::initialize();