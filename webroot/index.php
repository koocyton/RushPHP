<?php

define( "DS", DIRECTORY_SEPARATOR );

define( "RUSH_SITE_DIR", dirname(dirname(__FILE__)) );

define( "RUSH_CORE_DIR", RUSH_SITE_DIR . DS . "libs" . DS . "RushPHP" );

require( RUSH_CORE_DIR . DS . "bootstrap.php" );

$dispatcher = new RushPHP\HTTPDispatcher();

$dispatcher->dispatch();