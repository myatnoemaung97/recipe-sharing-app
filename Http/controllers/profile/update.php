<?php

use Core\Authenticator;
use Core\Session;
use Core\validators\RegistrationValidator;
use repositories\UserRepository;

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

authorize($_SESSION['user']['id'] == $id, 403);

$errors = RegistrationValidator::validate($name, $email, $password);

if (!empty($errors)) {
Session::flashErrorsAndOldData($errors, $_POST);
redirect("/profile/edit?id=" . $id);
}

$user = Authenticator::authenticateById($id, $password);

if (!$user) {
    Session::flashErrorsAndOldData([
        'password' => 'Incorrect password'
    ], $_POST);
    redirect("/profile/edit?id=" . $id);
}

$userRepo = new UserRepository();
$userRepo->update($id, $name, $email);

redirect('/profile?id=' . $id);
