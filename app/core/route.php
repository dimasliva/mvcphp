<?php
class Route
{
    static function start()
    {
        // Default controller and action
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode("/", $_SERVER['REQUEST_URI']);


        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // File name
        $model_name = "Model_" . $controller_name;
        $controller_name = "Controller_" . $controller_name;
        $action_name = "action_" . $action_name;

        // Model
        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/models/" . $model_file;

        if (file_exists($model_path)) {
            include  $model_path;
        } else {
            Route::Error404();
        }

        // Controller
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = 'app/controllers/' . $controller_file;

        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            Route::Error404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::Error404();
        }
    }

    static function Error404()
    {
        // $host = "app/views/404_view.php";
        // http_response_code(404);
        // header('HTTP/1.1 404 Not Found');
        // header("Status: 404 Not Found");
        // header("Location: " . "/" . $host);
        // exit();
    }
}
