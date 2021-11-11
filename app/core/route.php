<?php
class Route
{
    static function start()
    {
        // Default controller and action
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode("/", $_SERVER['REQUEST_URI']);
        var_dump($routes);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[1])) {
            $action_name = $routes[2];
        }
        $model_name = "Model_" . $controller_name;
        $controller_name = "Controller_" . $controller_name;
        $action_name = "action_" . $action_name;
    }
}
