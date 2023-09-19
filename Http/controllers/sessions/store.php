<?php
declare(strict_types=1);

use Core\Authenticator;
use Core\Session;
use Core\validators\LoginValidator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form
$errors = LoginValidator::validate($email, $password);

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect('/login');
}

$user = Authenticator::authenticateByEmail($email, $password);

if (!$user) {
    Session::flashErrorsAndOldData([
        'email' => 'No matching account found for that email and password'
    ], $_POST);
    redirect('/login');
}

if ($user['banned'] === 1) {
    Session::flashErrorsAndOldData([
        'email' => "Your account is banned"
    ], $_POST);
    redirect('/login');
}

login($user);

if ($user['is_admin'] === 1) {
    $_SESSION['admin'] = true;
} else {
    $_SESSION['admin'] = false;
}

redirect('/home');



