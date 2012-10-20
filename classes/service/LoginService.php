<?php
namespace service;

use RaftPHP\Singleton;
use dao;

class LoginService
{
	private $sign_key = "SW@Fs234l98#$#%RoGD";

	static public function getSingleton()
	{
		return Singleton::get("service\LoginService");
	}

	public function getLoginUserId()
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
		return common\Utils::sha256($user_id . $login_expire, $this->sign_key);
	}

	public function userLogin($login_name, $login_pass)
	{
        $userDao = dao\DataTableDao::getTableSingleton("user");
		$loginUser = $userDao->fetchRow(array("login_name"=>$login_name));

		$configDao = dao\DataTableDao::getTableSingleton("user_info");
	}
}