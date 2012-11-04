<?php
namespace RushPHP;

class ServiceBase
{
	public $use = array();

	public function __construct()
	{
		foreach($this->use as $model_name)
		{
			$this->$model_name = new ModelBase();
		}
	}
}