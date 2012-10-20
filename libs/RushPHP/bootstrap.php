<?php
/**
 * 配置 AutoLoad 规则
 */
function __autoload($class)
{
	$base_class_path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

	$class_path = ROOT_DIR . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . $base_class_path;
	
	if(!file_exists($class_path))
	{
		$class_path = CORE_DIR . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $base_class_path;
	}

	if(file_exists($class_path))
	{
		require_once($class_path);
	}
}

// 配置类
require CORE_DIR . DIRECTORY_SEPARATOR . 'Configure.php';

// 基础框架类
require CORE_DIR . DIRECTORY_SEPARATOR . 'Framework.php';

//
require CORE_DIR . DIRECTORY_SEPARATOR . 'ControlBase.php';