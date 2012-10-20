<?php
namespace RushPHP\help;

use RushPHP\Singleton;

// 异常
class DBHelperException
{
}

// 管理连接
class DriveHelperManager
{
	$drive_helper = array();

	public function __construct($db_config)
	{
		$this->setDbConnects($db_config);
	}

	public function setDbConnects($db_config)
	{
		foreach($db_config as $connect_code => $driver_config)
		{
			$Drive_helper = $connect_config['driver'] . "Helper";

			$this->db_connects[$connect_code] = $drive_helper::getConnect($driver_config);
		}
	}
}

$user_model = model\UserModel::getSingleton();
$user_model->getUserById();

$user_model->fieldUserById();

$user_model->fetchRow();
$user_model->fetchOne();

public function 

DBHelper::getSingleton();

class DBHelper
{
	$db_connects = array();

	static public function getSingleton($unique_key)
	{
		return Singleton::get("RaftPHP\help\PDOHelper", $unique_key);
	}

    public function __construct()
	{
	}

    public static function setPdo($dsn_info)
    {
		$this->pdo = new \PDO(
			$dsn_info['scheme'].':host='.$dsn_info['host'].';port='.$dsn_info['port'].';dbname='.$dsn_info['dbname'], $dsn_info['username'], $dsn_info['password'], 
			array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$dsn_info['charset']."';",
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			)
		);
	}

	public function executeQuery($query, $params=null)
	{
		$statement = $this->pdo->prepare($query);
		$result    = $statement->execute($params);

		$query_type = strtolower(substr($query, 0, 6));
		switch($query_type)
		{
			case "insert":
			case "replac":
				return $this->pdo->lastInsertId();
				break;

			case "update":
			case "delete":
				return $statement->rowCount();
				break;

			case "select":
				$statement->setFetchMode(\PDO::FETCH_ASSOC);
				return $statement->fetchAll();
				break;
		}
		return $result;
	}

	/** 
	 * 读取某个字段
	 * 
	 * @param table_name	表名
	 * @param where			需要操作的数据表
	 * @param field			需要查询的字段
	 * @param order			排序/排重
	 * 
	 * @return string
	 */
	public function fetchOne($table_name, $where="1", $fields="*", $order=null)
	{
		$result = $this->fetchRow($table_name, $where, $fields, $order);
		return empty($result) ? "" : current($result);
	}

	/** 
	 * 读取一行记录
	 * 
	 * @param table_name	表名
	 * @param where			需要操作的数据表
	 * @param field			需要查询的字段
	 * @param order			排序/排重
	 * @param limit			限制查询结果的条目数量
	 * 
	 * @return array 一维数组
	 */
	public function fetchRow($table_name, $where="1", $fields="*", $order=null)
	{
		$result = $this->fetchAll($table_name, $where, $fields, $order, "1");
		return empty($result) ? array() : current($result);
	}

	/** 
	 * 读取多行行记录
	 * 
	 * @param table_name	表名
	 * @param where			需要操作的数据表
	 * @param field			需要查询的字段
	 * @param order			排序/排重
	 * @param limit			限制查询结果的条目数量
	 * 
	 * @return array 二维数组
	 */
	public function fetchAll($table_name, $where="1", $fields="*", $order=null, $limit=null)
	{
		if (is_array($where))
		{
			$where = " 1 " . explode(" AND ", $where);
		}

		$query = "SELECT " . $fields . " FROM " . $table_name . " WHERE " . $where;

		$query = empty($order) ? $query : $query . $order;

		$query = empty($limit) ? $query : $query . " LIMIT "    . $limit;

		return $this->executeQuery($query);
	}

	public function insert($table_name, $array)
	{
		// 获得字段
		$fields = "`" . implode("`,`", array_keys($insert_array[0])) . "`";
		
		// 获得插入值
		$values = "";
		foreach($data as $key=>$val)
		{
			if ($values!="") $values .=",";
			// 获得值
			$values .= "('" . implode("','", array_map('addslashes', $val)) . "')";
		}

		// 插入到数据表
        $query = "INSERT INTO " . $table . " (" . $fields . ") VALUES " . $values;

		return $this->executeQuery($query);
	}

	public function multiInsert()
	{
		return $this->executeQuery($query);
	}

	public function update()
	{
		return $this->executeQuery($query);
	}

	public function delete()
	{
		return $this->executeQuery($query);
	}
}