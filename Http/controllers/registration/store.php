<?php
declare(strict_types=1);

use Core\Session;
use Core\validators\RegistrationValidator;
use Http\services\RegistrationService;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// validate the form
$errors = RegistrationValidator::validate($name, $email, $password);

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect('/register');
}

// check if the user is banned or the email is already used
$registrationService = new RegistrationService();

if ($registrationService->bannedUser($email)) {
    Session::flashErrorsAndOldData([
        'email' => "The account with this email is banned."
    ], $_POST);
    redirect('/register');
}

if ($registrationService->emailExists($email)) {
    Session::flashErrorsAndOldData([
        'email' => "An account with this email already exists"
    ], $_POST);
    redirect('/register');
}

// register user
$registrationService->register([
    'name' => $name,
    'email' => $email,
    'password' => $password]);

redirect('/home');
