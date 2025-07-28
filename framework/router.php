<?php

namespace Knot\Anvil\Framework;

use \Knot\Anvil\Framework\Views;

include_once dirname(__DIR__) . '/routes/web.php';

class Router {

    public static $routes = [];

    public function __construct($isAuthenticated) {

        if($_SERVER['REQUEST_URI'] == '/') {

            if($isAuthenticated) {
                Router::navigate('/dashboard');
            } else {
                Views::render('page-login');
            }

        } else {

            if(empty($_SESSION)) Router::navigate('/');

            $method = $_SERVER['REQUEST_METHOD'];
            $uri = $_SERVER['REQUEST_URI'];

            if(!isset(self::$routes[$method][explode('?', $uri)[0]]))
                die('Route not found.');

            $route = explode('@', self::$routes[$method][explode('?', $uri)[0]]);

            if(count($route) > 1) {
                $controller = 'Knot\Anvil\Controllers\\' . $route[0];
                $action = $route[1];
                $controller = new $controller;
                $controller->$action();
            } else {
                $controller = 'Knot\Anvil\Controllers\\' . $route[0];
                $controller = new $controller;
            }
        }
    }

    public static function get($path, $callback) {
        self::$routes['GET'][$path] = $callback;
    }

    public static function post($path, $callback) {
        self::$routes['POST'][$path] = $callback;
    }

    public static function update($path, $callback) {
        self::$routes['UPDATE'][$path] = $callback;
    }

    public static function delete($path, $callback) {
        self::$routes['DELETE'][$path] = $callback;
    }

    public static function navigate($path) {
        header('Location: ' . $path);
    }
}