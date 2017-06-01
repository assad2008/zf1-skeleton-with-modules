<?php

define('ROOT_PATH', realpath(dirname(__FILE__) . '/..'));
define('APPLICATION_PATH', ROOT_PATH . '/application');

include '../vendor/autoload.php';
use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
Debugger::$showBar = False;

require APPLICATION_PATH . '/Bootstrap.php';
$bootstrap = new Bootstrap();
$bootstrap->runApp();