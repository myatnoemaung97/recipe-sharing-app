<?php

use repositories\UserRepository;

$userRepo = new UserRepository();
$user = $userRepo->findById($_GET['id']);

authorize($_SESSION['user']['id'] == $_GET['id'], 403);

view('/profile/edit.view.php', [
    'user' => $user
]);
