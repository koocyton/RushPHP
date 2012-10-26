<?php
namespace service;

use RushPHP\Singleton;
use common\Utils;
use dao;

class Login
{
	private $sign_key   = "Sw@Fs234l98#$#%RoGD";
	
	private $use_models = array("info_user");

	/**
	 * 
	 * @return service\LoginService
	 */
	static public function getSingleton()
	{
		return Singleton::get("service\\LoginService");
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
		return Utils::sha256($user_id . $login_expire, $this->sign_key);
	}

	public function userLogin($login_name, $login_pass)
	{
        $this->info_user = $this->info_user->find('all',
			array('conditions'=> array("login_name"=>$login_name), 
			      'limit' => $cleft->limit,
			      'page'  => $cleft->page,
			      'order' => 'id DESC'));

        $this->info_user->delete();
        
        $this->info_user->save();
	}
}