<?php

class Router
{
    private array $routes = [];

    public function addRoute(string $path, array $routes)
    {
        $this->routes[$path] = $routes;
    }

    public function processRequest(string $path, string $method)
    {
        foreach ($this->routes as $routeUri => $routeMethods) {
            if ($routeUri === $path) {
                $controllerAction = $routeMethods[$method] ?? null;
                [$controller, $action] = explode('@', $controllerAction);
                break;
            }
        }

        if (isset($controller) && isset($action)) {
            require_once CONTROLLERS . $controller . ".php";
            $controllerObject = new $controller;
            $controllerObject->$action();
        } else {
            header("HTTP/1.1 404 NOT FOUND", true, 404);
            echo "404 ERROR";
        }
    }
}