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
		$user_info = $this->User->fetchRow(array("id"=>$user_id));
		$sys_apps  = array();
		$user_apps = $this->App->fetchAll(array("id"=>"in(".$user_info["installed_apps"].")"));
		return $user_apps;
	}
}