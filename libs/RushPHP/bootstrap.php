<?php
function __autoload($class_name)
{
	echo $class_name; echo "<br />\n";
	require_once( RUSH_SITE_DIR . DS . classes . DS . str_replace("\\", DS, $class_name) . '.php' );
}

// Configure
require RUSH_CORE_DIR . DS . 'Configure.php';

// View
require RUSH_CORE_DIR . DS . 'View.php';

// Singleton
require RUSH_CORE_DIR . DS . 'Singleton.php';

// ControllerBase
require RUSH_CORE_DIR . DS . 'ControllerBase.php';

// Dispather
require RUSH_CORE_DIR . DS . 'Dispatcher.php';