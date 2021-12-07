<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/app/components/Router.php');
require_once(ROOT . '/app/components/Db.php');


$router = new Router();
$router->run();
