<?php	  
namespace RushPHP;

/**
 * 单例管理器
 * 
 * @package RaftPHP
 */
class Singleton 
{
    private static $instances = array();
    
    /**
     * 根据类名获取该类的单例
     * 
     * @param string $class_name
     * @param string $unique_key
	 *
     * @return Object
     */ 
    public static function get($class_name, $unique_key=null)
    {
		$unique_key = empty($unique_key) ? $class_name : $unique_key;

		if (!array_key_exists($unique_key, self::$instances))
		{
			self::$instances[$unique_key] = new $class_name();
		}
        
		return self::$instances[$unique_key];
    }
}