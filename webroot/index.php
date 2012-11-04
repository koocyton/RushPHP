<?php
use RushPHP\dispatcher;

define( "DS", DIRECTORY_SEPARATOR );

define( "RUSH_SITE_DIR", dirname(dirname(__FILE__)) );

define( "RUSH_LIBS_DIR", RUSH_SITE_DIR . DS . "libs" );

define( "RUSH_CORE_DIR", RUSH_LIBS_DIR . DS . "RushPHP" );

require( RUSH_CORE_DIR . DS . "bootstrap.php" );

$dispatcher = new dispatcher\HTTPDispatcher();

$dispatcher->dispatch();