<?php

namespace Core\Middleware;

class Admin
{
    public static function handle() {
        if ($_SESSION['admin'] === false || !isset($_SESSION['user'])) {
            redirect('/');
        }
    }
}