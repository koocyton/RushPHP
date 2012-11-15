<?php
namespace RushPHP\helper\DBConnect;

use RushPHP\Singleton;

class PDOConnect
{
    private $pdo = null;

    public function __construct($config)
	{
		$this->pdo = new \PDO(
				$config['scheme'].':host='.$config['host'].';port='.$config['port'].';dbname='.$config['database'], $config['login'], $config['password'],
				array(
						\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '".$config['charset']."';",
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
		$result = $this->fetchAll($table_name, $condition, 0, 1, null, null);
		return empty($result) ? array() : current($result);
	}
	
	public function fetchAll($table_name, $condition, $start=0, $length=99999999, $order=null, $group=null)
	{
		if (is_array($condition))
		{
			$_condition = "1";

			foreach($condition as $field=>$value)
			{
				if (preg_match("/^(in ?\\(|\\>|\\<|\\between)/", $value))
				{
					$_condition .= " AND `" . $field . "` " . $value;
				}
				else
				{
					$_condition .= " AND `" . $field . "`='" . $value ."'";
				}
			}
			$condition = $_condition;
		}

		$query = "SELECT * FROM " . $table_name . " WHERE " . $condition;

		$query = empty($order)  ? $query : $query . $order;

		$query = empty($length) ? $query : $query . " LIMIT " . $start . ", " . $length;
		// echo $query . "<br>\n";
		return $this->executeQuery($query);
	}
}