<?php
namespace service;

use RushPHP\Singleton;
use common\Utils;
use dao;

class Login
{
	private $use = array("User");

	/**
	 * 返回 service\Login
	 * 
	 * @return service\Login
	 */
	static public function getSingleton()
	{
		return Singleton::get("service\\Login");
	}

	public function checkSession()
	{
		if (!empty($_COOKIE['wess']) && preg_match("^/(.+)_(.+)_(.+)/$", $_COOKIE['wess'], $matchs))
		{
			$user_id      = $matchs[1];
			$login_expire = $matchs[2];
			$login_sign   = $matchs[3];

			$hash_login_sign = $this->createLoginSign($user_id, $login_expire);

			if ($login_expire>time() && $hash_login_sign==$login_sign)
			{
				return $user_id;
			}
		}
		return false;
	}

	private function createLoginSign($user_id, $login_expire)
	{
		return Utils::sha256($user_id . $login_expire, "Sw@Fs234l98#$#%RoGD");
	}
	
	public function logout()
	{
		$_COOKIE['wess'] = "";
		setcookie("wess", null);
	}

	public function login($account, $password)
	{
        $user_info = $this->User->fetchRow("account", $account);

		if (empty($user_info))
		{
			return 1;
		}
		else if ( $user_info["password"] != md5($password . "_#\$W%z9H") )
		{
			return 2;
		}
		$_COOKIE['wess'] = $user_info["id"] . "_" . NOW_TIME . "_" . $this->createLoginSign($user_info["id"], NOW_TIME);
		setcookie("wess", $_COOKIE['wess']);

		return 0;
	}
}