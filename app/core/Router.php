<?php
class Router
{
    private $routes;

    function __construct()
    {
        $routesPath = ROOT . "/app/config/routes.php";
        $this->routes = include $routesPath;
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode("/", $path);

                $controllerName = array_shift($segments) . "Controler";
                $controllerName = ucfirst($controllerName);

                $actionName = "action" . ucfirst(array_shift($segments));
                echo "<br>Class: $controllerName";
                echo "<br>Method: $actionName";
            }
        }
    }
}
