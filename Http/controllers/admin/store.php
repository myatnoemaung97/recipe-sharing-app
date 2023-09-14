<?php

use Core\Session;
use Core\validators\RegistrationValidator;
use Models\User;
use repositories\AdminRepository;
use repositories\StatsRepo;
use repositories\UserRepository;

$adminRepo = new AdminRepository();
$userRepo = new UserRepository();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = RegistrationValidator::validate($name, $email, $password);

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect('/admins/create');
}

$userRepo = new UserRepository();
$user = new User($name, $email, $password);
$user->setIsAdmin(1);
$user = $userRepo->save($user);

$adminRepo->save($user['id']);

$statsRepo = new StatsRepo();
$statsRepo->updateUsers();

redirect('/home/admin/admins');
