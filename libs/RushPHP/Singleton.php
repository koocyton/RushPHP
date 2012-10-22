<?php	  
namespace RushPHP;

class Singleton 
{
    private static $instances = array();

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