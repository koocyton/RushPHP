<?php
namespace service;

use RushPHP\Singleton;
use RushPHP\ServiceBase;
use common\Utils;
use dao;

class Login extends ServiceBase
{
	public $use = array("User");

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
		if (!empty($_COOKIE['wess']) && preg_match("/^(.+)_(.+)_(.+)$/", $_COOKIE['wess'], $matchs))
		{
			$user_id      = $matchs[1];
			$login_expire = $matchs[2];
			$login_sign   = $matchs[3];

			$hash_login_sign = $this->createLoginSign($user_id, $login_expire);

			if ($login_expire>=NOW_TIME-3600*24 && $login_expire<=NOW_TIME && $hash_login_sign==$login_sign)
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
	
	public function regist($account, $password, $re_password, $account_info)
	{
		$md5_password = md5($password . "_#\$W%z9H");
		
		$this->User->create(array(
				"account"  => $account,
				"password" => $md5_password,
				"nick"     => $account_info["nick"],
				"email"    => $account_info["email"],
		));
	}
	
	public function logout()
	{
		$_COOKIE['wess'] = "";
		setcookie("wess", null);
	}

	public function login($account, $password, $remember_me=false)
	{
        $user_info = $this->User->fetchRow(array("account"=>$account));

		if (empty($user_info))
		{
			return 1;
		}
		else if ( $user_info["password"] != md5($password . "_#\$W%z9H") )
		{
			return 2;
		}

		$_COOKIE['wess'] = $user_info["id"] . "_" . NOW_TIME . "_" . $this->createLoginSign($user_info["id"], NOW_TIME);
		
		$expire = ($remember_me==true) ? 86400 * 30 + NOW_TIME : 0;

		setcookie("wess", $_COOKIE['wess'], $expire);

		return 0;
	}
}