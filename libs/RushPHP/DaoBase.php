<?php
namespace RaftPHP;

class DaoBase
{
	public function __construct($table_name, $dao_config)
	{
		$this->table_name = $table_name;

		$this->dao_config  = $db_helper;
	}

	public function fetchOne($where, $field="*")
	{
	}

	public function fetchRow($where, $field="*")
	{
	}

	public function fetchAll($ids)
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