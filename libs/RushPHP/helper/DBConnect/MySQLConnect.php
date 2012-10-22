<?php
namespace framework\data\model;

use \PDO;

/**
 * MySQL 操作类，用于 MySQL 的数据操作
 * 
 */
class MysqlHelper
{
	/** 
	 * 读取某个字段
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param key    id
	 * @param field  需要查询的字段
	 * 
	 * @return string
	 */
	public function readOne($pdo, $table, $key, $field)
	{
		// 禁止无索引查询表
		if (empty($key)) return array();
		$ret = $this->readLine($pdo, $table, $key, $field);
		return empty($ret) ? '' : $ret->$field;
	}

	/** 
	 * 读取一行记录
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param key    id
	 * @param field  需要查询的字段
	 * 
	 * @return array 一维数组
	 */
	public function readLine($pdo, $table, $key, $fields="*")
	{
		// 禁止无索引查询表
		if (empty($key)) return array();

		$ret = $this->readAll($pdo, $table, $key, $fields);
		return empty($ret) ? array() : $ret[0];
	}

	/** 
	 * 读取多行行记录
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param key    id
	 * @param field  需要查询的字段
	 * 
	 * @return array 二维数组
	 */
	public function readAll($pdo, $table, $keys, $fields="*")
	{
		// 禁止无索引查询表
		if (empty($keys)) return array();
		// 预定义要查询的条件为字符串
		$keys = is_array($keys) ? implode(",", $keys) : $keys;
		$fields = '*';
		$keys = preg_replace(array("/ /", "/^(,+)?(.+?)(,+)?$/", "/,+/"), array("", "'\$2'", "','"), $keys);
		// 查询

		$query = "SELECT " . $fields . " FROM " . $table . " WHERE `id` IN (" . $keys . ")";
		$statement = $pdo->prepare($query);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "entity\\" . $table);
        return $statement->fetchAll();
	}

	/**
	 * 执行sql语句，返回执行的结果
	 * 
	 * @param unknown_type $pdo
	 * @param string $sql
	 * @param string $class
	 */
	public function execSql($pdo, $sql, $class=null)
	{
		$statement = $pdo->prepare($sql);
		$statement->execute();
		if (!empty($class))
		{
			$statement->setFetchMode(\PDO::FETCH_CLASS, $class);
		}
		else
		{
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
		}
		return $statement->fetchAll();
	}
	
	/**
	 * 通过sql删除数据,用于测试
	 * 
	 * @param unknown_type $pdo
	 * @param string $sql
	 * @param string $class
	 */
	public function deleteBySql($pdo, $sql)
	{
		$statement = $pdo->prepare($sql);
		$statement->execute();
		
		return true;
	}
	
	/** 
	 * 读取静态表所有记录
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param field  需要查询的字段
	 * 
	 * @return array 二维数组
	 */
	public function readAllInfo($pdo, $table, $fields = '*')
	{
		// 预定义要查询的条件为字符串
		$keys = is_array($keys) ? implode(",", $keys) : $keys;

		$keys = preg_replace(array("/ /", "/^(,+)?(.+?)(,+)?$/", "/,+/"), array("", "'\$2'", "','"), $keys);
		$fields = '*';
		// 查询
		$query = "SELECT " . $fields . " FROM " . $table;
//		error_log( $query);
		$statement = $pdo->prepare($query);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_CLASS, "entity\\" . $table);
        return $statement->fetchAll();
	}
	
	/** 
	 * 插入多条记录
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param data   插入的数据
	 * 
	 * @return bool
	 */
	public function createMulti($pdo, $table, $data)
	{
		// 获得字段
		$fields = "`" . implode("`,`", array_keys($data[0])) . "`";
		
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
        // 提交插入到表
        $statement = $pdo->prepare($query);
        return $statement->execute();
	}

	/** 
	 * 插入一条数据记录
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param data   插入的数据
	 * @param onDuplicate  如果主键重复，需要更新的数据
	 * 
	 * @return id
	 */
	public function create($pdo, $table, $data, $onDuplicate=null)
	{
		// 不应该存在 id ，id 是固定主键
		// unset($data['id']);
		$fields = array_keys($data);
		if (empty($fields))
		{
			return false;
		}
		// 获得字段
		$fields = "`" . implode("`,`", $fields) . "`";
		// 获得值
		$values = "'" . implode("','", array_map(array($this, 'quote'), $data)) . "'";

		// 插入到数据表
        $query = "INSERT INTO " . $table . " (" . $fields . ") VALUES (" . $values . ")";
        
        // 如果唯一键冲突，则更新
        if (!empty($onDuplicate)) $query .= " ON DUPLICATE KEY UPDATE " . $onDuplicate;
//        error_log($query);
        // 提交插入到表
        $statement = $pdo->prepare($query);
        $statement->execute();
        //error_log($query);
        return $pdo->lastInsertId();
	}
	
	/**
	 * addslashes
	 * 
	 * @param mixed $str
	 */
	private function quote($str)
	{
		if (!empty($str) && is_string($str))
		{
			$str = addslashes($str);
		}
		return $str;
	}
	
	/** 
	 * 跟新数据记录
	 * 
	 * @param pdo    传入的 PDO 对象
	 * @param table  需要操作的数据表
	 * @param data   要跟新的数据
	 * 
	 * @return bool
	 */
	public function update($pdo, $table, $data)
	{
		$setValue = '';
		
		foreach($data as $key=>$val)
		{
			if ($setValue!="") $setValue .= ',';
			$setValue .= '`' . $key . '` = \'' . addslashes($val) . '\'';
		}
        $query = "UPDATE " . $table . " SET " . $setValue . " WHERE `id`='" . addslashes($data['id']) . "'";
//        error_log($query);
        $statement = self::$pdo->prepare($query);
        return $statement->execute();
	}

	/** 
	 * 删除数据
	 * 
	 * @param pdo    PDO 对象
	 * @param table  要跟新的数据表
	 * @param key    要跟新的KEY
	 * 
	 * @return bool
	 */
	public function delete($pdo, $table, $key)
	{
		if (!empty($key) && is_string($key))
		{
			$key = explode(',', $key);
		}
		if (!empty($key) && is_array($key))
		{
			$key = join("','", $key);
		}
		
        $query = "DELETE FROM " . $table . " WHERE `id` in ('" . addslashes($key) . "')";
        
        $statement = $pdo->prepare($query);
        return $statement->execute();
	}
	
	/** 
	 * 获得 PDO 对象所指数据库的所有表(表名，字段)信息
	 * 
	 * @param pdo 传入的PDO对象
	 * 
	 * @return array
	 */
	public function getAllTableInfo($pdo)
	{
		$tablesInfo = array();

		// 查询语句
        $statement = $pdo->prepare("show tables");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $tables = $statement->fetchAll();
        
        if (!empty($tables) && is_array($tables))
        {
			$tablesInfo = array();

        	foreach($tables as $table)
        	{
        		$tableName = current($table);

				// 查询语句
		        $statement = $pdo->prepare("SHOW CREATE TABLE " . $tableName);
		        $statement->execute();
		        $statement->setFetchMode(\PDO::FETCH_ASSOC);
		        $fetchResult = $statement->fetchAll();

				/* `level` int(11) NOT NULL DEFAULT '1' COMMENT '玩家的等级', */
				$createTableSql = $fetchResult[0]['Create Table'];
				preg_match_all('/\`([a-zA-Z0-9_]+)\`\s+([a-z0-9\(\)\'\,]+).*(DEFAULT\s+\'(.*?)\')?\s+(COMMENT\s+\'(.*?)\')?\s*,/i', $createTableSql, $matchs, PREG_PATTERN_ORDER);
				$tablesInfo[$tableName] = array();

		        foreach($matchs[1] as $ii=>$field)
		        {
					$tablesInfo[$tableName][$ii] = array();
					$tablesInfo[$tableName][$ii]['field']    = $matchs[1][$ii];
					$tablesInfo[$tableName][$ii]['value']    = $matchs[4][$ii];
					$tablesInfo[$tableName][$ii]['type']     = $matchs[2][$ii];
					$tablesInfo[$tableName][$ii]['comment']  = $matchs[6][$ii];
		        }
        	}
        	
        	return $tablesInfo;
        }
        return null;
	}
}

class MemcacheHelp  { }

