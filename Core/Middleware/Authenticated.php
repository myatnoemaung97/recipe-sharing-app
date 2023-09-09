<?php

namespace Core\Middleware;

class Authenticated
{
    public static function handle() {
        if (! isset($_SESSION['user'])) {
            redirect('/');
        }
    }

}