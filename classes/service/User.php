<?php
namespace service;

use RushPHP\Singleton;
use RushPHP\ServiceBase;

class User extends ServiceBase
{
	public $use = array("User", "App");

	/**
	 * 返回 service\User
	 * 
	 * @return service\User
	 */
	static public function getSingleton()
	{
		return Singleton::get("service\\User");
	}
	
	/*
	 * 取得用户的 Apps Info
	 */
	public function getUserAppsInfo($user_id)
	{
		$user_info      = $this->User->fetchRow(array("id"=>$user_id));
		$system_apps_id = "6151,1,2,3,4,5,6,7";
		$portal_apps_id = empty($user_info["installed_apps"]) ? $system_apps_id : $system_apps_id . ", " . $user_info["installed_apps"];
		$condition = array("id"=>"in (" . $portal_apps_id . ")");
		$portal_apps = $this->App->fetchAll($condition);
		return $portal_apps;
	}
}