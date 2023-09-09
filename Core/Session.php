<?php

namespace Core;

class Session
{
    public static function put($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function flashOldData($key, $value)
    {
        $_SESSION['_flash']['old'][$key] = $value;
    }

    public static function unflashOldData()
    {
        unset($_SESSION['_flash']['old']);
    }

    public static function flashError($key, $value)
    {
        $_SESSION['_flash']['errors'][$key] = $value;
    }

    public static function unflashErrors()
    {
        unset($_SESSION['_flash']['errors']);
    }

    public static function unflash() {
        static::unflashErrors();
        static::unflashOldData();
    }
    public static function flush()
    {
        $_SESSION = [];
    }

    public static function flashErrorsAndOldData($errors, $old) {
        foreach ($errors as $key => $value) {
            static::flashError($key, $value);
        }
        foreach ($old as $key => $value) {
            static::flashOldData($key, $value);
        }
    }

    public static function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}