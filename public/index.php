<?php

define('ROOT_PATH', realpath(dirname(__FILE__) . '/..'));
define('APPLICATION_PATH', ROOT_PATH . '/application');
define('DATA_PATH', ROOT_PATH . '/data');

include '../vendor/autoload.php';
require 'App/Helpers.php';

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
Debugger::$showBar = false;

require APPLICATION_PATH . '/Bootstrap.php';
$bootstrap = new Bootstrap();
$bootstrap->runApp();
