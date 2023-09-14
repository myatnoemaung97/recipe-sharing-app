<?php

use repositories\UserRepository;

$userRepo = new UserRepository();

view("/admin/users.view.php", [
    'users' => $userRepo->findAll($_GET['sort'] ?? '')
]);
