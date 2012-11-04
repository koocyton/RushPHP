<?php
function __autoload($class_name)
{
	@include ( RUSH_SITE_DIR . DS . classes . DS . str_replace("\\", DS, $class_name) . '.php' );

	if (!class_exists($class_name))
	{
		// echo RUSH_LIBS_DIR . DS . str_replace("\\", DS, $class_name) . '.php'."\n<br />";
		@include ( RUSH_LIBS_DIR . DS . str_replace("\\", DS, $class_name) . '.php' );
	}
}


// Configure
require RUSH_CORE_DIR . DS . 'Configure.php';

// Singleton
require RUSH_CORE_DIR . DS . 'Singleton.php';

// Dispather
require RUSH_CORE_DIR . DS . 'Dispatcher.php';

// ControllerBase
require RUSH_CORE_DIR . DS . 'ControllerBase.php';

// ServiceBase
require RUSH_CORE_DIR . DS . 'ServiceBase.php';

// ModelBase
require RUSH_CORE_DIR . DS . 'ModelBase.php';

// View
require RUSH_CORE_DIR . DS . 'View.php';