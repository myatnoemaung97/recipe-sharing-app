<?php

use repositories\UserRepository;

$userRepo = new UserRepository();

view("/admin/banned.view.php", [
    'users' => $userRepo->findByBanned()
]);
