<?php
namespace RushPHP;

use RushPHP\helper\DBHelper;

class ResultPool
{
	public static $result = array();
	
	public static $delete = array();
	
	public static $update = array();
}

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
		return $db_help->fetchRow($this->table, $condition);
	}

	public function fetchAll($condition, $start=0, $length=null, $order=null, $group=null)
	{
		$db_help = DBHelper::getSingleton($this->config);
		return $db_help->fetchAll($this->table, $condition, $start, $length, $order, $group);
	}

	public function delete($condition)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->delete($this->table, $condition);
	}

	public function create($data)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->create($this->table, $data);
	}

	public function update($data)
	{
		$db_help = DBHelper::getSingleton( $this->config_name );
		return $db_help->update($this->table, $data);
	}
}