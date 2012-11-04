<?php
namespace RushPHP;

use RushPHP\helper\DBHelper;

class ModelBase
{
	public $model_name = "";

	public $config_name = "default";

	public function fetchRow($condition)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->find($condition);
	}

	public function fetchAll($condition, $start, $length, $order, $group)
	{
		
	}

	public function delete($condition)
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