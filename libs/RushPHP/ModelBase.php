<?php
namespace RushPHP;

class ModelBase
{
	public $model_data  = null;

	public $model_name  = "";

	public $model_index = null;

	public $rdb_helper  = null;

	public $wdb_helper  = null;

	public $wc_helper   = null;

	public function __construct($table_name, $db_helper=null, $rc_helper=null, $wc_helper=null)
	{
		$this->table_name = $table_name;

		$this->db_helper  = $db_helper;

		$this->rc_helper  = $rc_helper;

		$this->wc_helper  = $wc_helper;
	}

	public function fetchOne($where, $field="*")
	{
		if ($this->db_helper!=null)
		{
			$this->db_helper->fetchOne($this->model_name, $where, $field);
		}
	}

	public function fetchRow($where, $field="*")
	{
		if ($this->db_helper!=null)
		{
			$this->db_helper->fetchRow($this->model_name, $where, $field);
		}
	}

	public function fetchAll($ids)
	{
		$this->db_helper->fetchAll($field, $id);
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