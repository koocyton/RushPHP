<?php
namespace RushPHP;

use RushPHP\helper\DBHelper;

class ModelBase
{
	public $table  = "";

	public $config = "";
	
	public function __construct($table="", $config="")
	{
		$this->table  = empty($table)  ? $this->table  : $table;
		$this->config = empty($config) ? $this->config : $config;
	}

	public function fetchRow($condition)
	{
		$db_help = DBHelper::getSingleton($this->config);
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