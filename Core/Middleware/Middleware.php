<?php

namespace Core\Middleware;

class Middleware
{
    const map = [
        'guest' => Guest::class,
        'authenticated' => Authenticated::class,
        'admin' => Admin::class
    ];

    public static function authorize($middleware) {
        $middleware = static::map[$middleware];
        (new $middleware)->handle();
    }
}