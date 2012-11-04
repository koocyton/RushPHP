<?php
namespace RushPHP\helper\DBConnect;

use RushPHP\Singleton;

class PDOConnect
{
    private $pdo = null;

    public function __construct()
	{
	}

	public function setConnecter($conn_info)
	{
		$this->pdo = new \PDO(
				$conn_info['scheme'].':host='.$conn_info['host'].';port='.$conn_info['port'].';dbname='.$conn_info['database'], $conn_info['login'], $conn_info['password'],
				array(
						\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$conn_info['charset']."';",
						\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
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

	public function fetchRow($table_name, $condition="1")
	{
		$result = $this->fetchAll($table_name, $condition, "*", null, "1");
		return empty($result) ? array() : current($result);
	}

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
}