<?php
/**
 * @file   DataTableDao.php
 * @author koocyton <koocyton@gmail.com>
 *
 * @package       dao
 * @subpackage    DaoBase
 */
namespace dao;

use RaftPHP\DaoBase;

class DataTableDao extends DaoBase
{
	public function getTableSingleton()
	{
		return $this;
	}
}