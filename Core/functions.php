<?php

use Core\Response;
use Core\Session;

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: $path");
    exit();
}

function login($user)
{
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name']
    ];

    session_regenerate_id(true);
}

function logout()
{
    Session::destroy();
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function difficultyToInt($difficulty) {
    switch($difficulty) {
        case 'easy':
            return 1;
            break;
        case 'medium':
            return 2;
            break;
        case 'hard':
            return 3;
            break;
    }
}

function intToDifficulty($value) {
    switch($value) {
        case 1:
            return 'Easy';
            break;
        case 2:
            return 'Medium';
            break;
        case 3:
            return 'Hard';
            break;
    }
}

function arrayToCsv($array) {
    $csv = '';
    foreach ($array as $value) {
        if (!empty($value)) {
            $csv = $csv . trim($value) . ',';
        }
    }
    $csv = substr($csv, 0, -1);

    return $csv;
}

function csvToArray($csv) {
    return explode(',', $csv);
}

function loggedIn() {
    return isset($_SESSION['user']);    
}

function getParams($attributes) {
    $array = [];
    foreach ($attributes as $key => $value) {
        if ($value !== '') {
            $array[$key] = $value;
        }
    }

    return $array;
}

