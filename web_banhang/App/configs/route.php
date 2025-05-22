<?php

class Route
{
    static function start()
    {
        session_start();
        $controller_name = 'Store';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // Logic phân biệt admin và buyer
        if ($controller_name === 'admin') {
            // Điều hướng Admin đến Controller_Admin
            $model_name = 'Model_Admin';
            $controller_name = 'Controller_Admin';
        } elseif ($controller_name === 'profile') {
            // Điều hướng Buyer đến Controller_Profile
            $model_name = 'Model_Profile';
            $controller_name = 'Controller_Profile';
        } else {
            // Mặc định Store
            $model_name = 'Model_' . $controller_name;
            $controller_name = 'Controller_' . $controller_name;
        }

        $action_name = 'action_' . $action_name;

        // Nạp model
        $model_file = strtolower($model_name) . '.php';
        $model_path = "App/models/" . $model_file;
        if (file_exists($model_path)) {
            include $model_path;
        }

        // Nạp controller
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "App/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            Route::ErrorPage404();
        }

        // Gọi action
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'store');
    }
}
