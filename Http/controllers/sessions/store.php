<?php

use Core\Authenticator;
use Core\Session;
use Core\validators\LoginValidator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = LoginValidator::validate($email, $password);

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect('/login');
}

$user = Authenticator::authenticate($email, $password);

if (!$user) {
    Session::flashErrorsAndOldData([
        'email' => 'No matching account found for that email and password'
    ], $_POST);
    redirect('/login');
}

login($user);
redirect('/home');



