<?php
function __autoload($class_name)
{
	require_once( RUSH_SITE_DIR . DS . classes . DS . str_replace("\\", DS, $class_name) . '.php' );
}

// Configure
require RUSH_CORE_DIR . DS . 'Configure.php';

// Singleton
require RUSH_CORE_DIR . DS . 'Singleton.php';

// Dispather
require RUSH_CORE_DIR . DS . 'Dispatcher.php';

// ControllerBase
require RUSH_CORE_DIR . DS . 'ControllerBase.php';

// DaoBase
require RUSH_CORE_DIR . DS . 'ModelBase.php';

// View
require RUSH_CORE_DIR . DS . 'View.php';