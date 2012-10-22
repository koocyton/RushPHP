<?php
namespace RushPHP;

use RushPHP\helper\DBHelper;

/**
 * 
 * $user = new Entity\User();
 * $user->uuid = 12;
 *
 * $user = UserDao::getEntity();
 * 
 * $user->liuyi = 123;
 * $user->abc   = 4456;
 * $user->where = where 
 * 
 * $user->create();
 * $user->save();
 * $user->remove();
 * $user->update();
 * 
 * $users->save();
 * $users->remove();
 */
class DaoBase extends DBHelper
{
	public function __construct($table_name, $dao_config)
	{
		$this->table_name = $table_name;

		$this->dao_config  = $dao_config;
	}

	public function fetchOne($where)
	{
		$this->fetchRow();
	}

	public function fetchRow($where)
	{
		$this->fetchRows($where, 1, 1);
	}

	public function fetchRows($where)
	{
		// select * from table where 1 and $where limit 1, 1
		// select * from table where 1 and $where limit 1
		// select * from table where 1 and $where order by a limit 1
		
	}

	public function create()
	{
	}

	public function delete()
	{
	}

	public function update()
	{
	}
}