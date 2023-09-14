<?php

use Core\Session;
use Core\validators\RegistrationValidator;
use Models\User;
use repositories\StatsRepo;
use repositories\UserRepository;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = RegistrationValidator::validate($name, $email, $password);

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect('/register');
}

$userRepo = new UserRepository();
$user = new User($name, $email, $password);
$user = $userRepo->save($user);

login($user);

$statsRepo = new StatsRepo();
$statsRepo->updateUsers();

redirect('/home');
