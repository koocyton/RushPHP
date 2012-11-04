<?php
namespace RushPHP;

use model;

class ServiceBase
{
	public $use = array();

	public function __construct()
	{
		foreach($this->use as $model_name)
		{
			$model_class = "model\\" . $model_name;

			if (class_exists($model_class))
			{
				$this->$model_name = new $model_class();
			}
			else
			{
				$this->$model_name = new ModelBase($model_name);
			}
		}
	}
}