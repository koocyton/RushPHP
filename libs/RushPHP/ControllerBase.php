<?php
namespace RushPHP;

abstract class ControllerBase
{
	/**
	 * 获取控制器类名
	 * @return String
	 */
	abstract public function beforeFilter();
	
	/**
	 * 获取控制器方法名
	 * @return String
	 */
	abstract public function afterFilter();
}