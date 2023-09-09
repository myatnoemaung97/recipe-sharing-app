<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($url, $controller, $method) {
        $this->routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($url, $controller) {
        return $this->add($url, $controller, 'GET');
    }

    public function post($url, $controller) {
        return $this->add($url, $controller, 'POST');
    }

    public function delete($url, $controller) {
        return $this->add($url, $controller, 'DELETE');
    }

    public function put($url, $controller) {
        return $this->add($url, $controller, 'PUT');
    }

    public function patch($url, $controller) {
        return $this->add($url, $controller, 'PATCH');
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($url, $method) {
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    Middleware::authorize($route['middleware']);
                }

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}