<?php
/**
 * @file   AppBaseDao.php
 * @author koocyton <koocyton@gmail.com>
 *
 * @package       dao
 * @subpackage    DaoBase
 */
namespace dao;

use RaftPHP\DaoBase;

class AppBaseDao extends DaoBase
{
	static public function getSingleton()
	{
		print_r(get_class());exit;
	}
}