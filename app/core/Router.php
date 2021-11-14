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


                $intertalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Controller&Action name

                $segments = explode("/", $intertalRoute);


                $controllerName = ucfirst(array_shift($segments)) . "Controller";
                $actionName = "action" . ucfirst(array_shift($segments));

                $parameters = $segments;
                $controllerFile = ROOT . "/app/controllers/" . $controllerName . ".php";

                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }
                $controllerObject = new $controllerName;


                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                echo "<br>" . $actionName;

                echo "<pre>";
                print_r($segments);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}
