<?php
namespace RushPHP;

use RushPHP\helper\DBHelper;

class ModelBase
{
	
	public $model_name = "";

	public $config_name = "default";

	public function find($condition)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->find($condition);
	}

	public function delete($ids)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->delete($ids);
	}

	public function save($data)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->save($data);
	}
}