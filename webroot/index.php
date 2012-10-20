<?php
use RaftPHP\dispatcher;

// 配置 APP 的 ROOT 目录
define("ROOT_DIR", dirname(dirname(__FILE__)));

// 配置 APP 的配置文件存放目录
define("CONF_DIR", ROOT_DIR . DIRECTORY_SEPARATOR . "config");

// 配置框架的目录
define("LIBS_DIR", ROOT_DIR . DIRECTORY_SEPARATOR . "libs");

// 配置框架的目录
define("CORE_DIR", LIBS_DIR . DIRECTORY_SEPARATOR . "RaftPHP");

// 引入框架
require(CORE_DIR . DIRECTORY_SEPARATOR . "bootstrap.php");

// 配置文件初始化
RaftPHP\Configure::initialize();

// 框架初始化
RaftPHP\Framework::initialize();

// dispatcher
$dispatcher = new dispatcher\HTTPDispatcher();
$dispatcher->dispatch();