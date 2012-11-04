<?php
namespace RushPHP;

use RushPHP\helper\DBHelper;

class ModelBase
{
	public $dbtable_name = "";

	public $dbhelper_config = "";
	
	public function __construct($model_name, $dbhelper_config="default")
	{
		$this->model_name      = $model_name;
		$this->dbhelper_config = $dbhelper_config;
	}

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
		return $db_help->delete($condition);
	}

	public function create($data)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->create($data);
	}

	public function update($data)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->update($data);
	}
}