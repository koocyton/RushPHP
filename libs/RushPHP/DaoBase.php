<?php
namespace RushPHP;

class DaoBase
{
	public function __construct($table_name, $dao_config)
	{
		$this->table_name = $table_name;

		$this->dao_config  = $dao_config;
	}

	public function fetchOne($where, $field="*")
	{
	}

	public function fetchRow($where, $field="*")
	{
	}

	public function fetchAll($where)
	{
	}

	public function create()
	{
	}

	public function remove()
	{
	}

	public function update()
	{
	}
}