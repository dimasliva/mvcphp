<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

define('ROOT', dirname(__FILE__));
//require_once(ROOT . '/app/components/Router.php');
require_once(ROOT . '/app/components/Db.php');

use app\components\Router;

$router = new Router();
$router->run();
