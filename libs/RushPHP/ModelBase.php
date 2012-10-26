<?php
namespace RushPHP;

class ModelPond
{
	public static $models = array();
	
	public static $index  = array();
}

class ModelBase
{
	public $name = "";
	
	public $uuid = "";

	public function find($id)
	{
		$this->uuid = $this->name . "_" . $id;

		if (empty(ModelPond::$models[$this->uuid]))
		{
			ModelPond::$models[$this->uuid] = "";
		}
	}

	public function delete()
	{
		if ($this->uuid=="") return false;

		unset(ModelPond::$models[$this->uuid]);

		return true;
	}

	public function save()
	{
		
	}
}