<?php
class DBHelperConfigure
{
	public static $db1 = array(
		'connect'  => 'PDO',
		'scheme'   => 'mysql',
		'host'     => '127.0.0.1',
		'port'     => '3306',
		'login'    => 'rushphp',
		'password' => 'rushphp',
		'database' => 'rushphp',
		'charset'  => 'UTF8',
		'prefix'   => '',
	);

	public static $cc1 = array(
		'connect'  => 'Constcache',
		'prefix'   => '',
	);

	public static $mc1 = array(
		'connect'  => 'Memcache',
		'host'     => '127.0.0.1',
		'port'     => '12031',
		'prefix'   => '',
	);

	public static $mc2 = array(
		'connect'  => 'Memcache',
		'host'     => '127.0.0.1',
		'port'     => '12032',
		'prefix'   => '',
	);

	public static $mc3 = array(
		'connect'  => 'Memcache',
		'host'     => '127.0.0.1',
		'port'     => '12033',
		'prefix'   => '',
	);
	
	public static $static = array();

	public static $activity = array();
}

DBHelperConfigure::$activity = array(
	'basedata'  => DBHelperConfigure::$db1,
	'cache'     => array(
					DBHelperConfigure::$mc1,
					DBHelperConfigure::$mc2,
					DBHelperConfigure::$mc3,
				),
	'hashrule'  => "name",
);

DBHelperConfigure::$static = array(
	'basedata'  => DBHelperConfigure::$db1,
	'cache'     => DBHelperConfigure::$cc1,
);
