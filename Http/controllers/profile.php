<?php

use repositories\UserRepository;

$userRepo = new UserRepository();
$user = $userRepo->findById($_SESSION['user']['id']);

view('profile.view.php', [
    'user' => $user
]);