<?php

use repositories\UserRepository;

$userRepo = new UserRepository();

view('/admin/admins.view.php', [
    'admins' => $userRepo->findByAdmin(1)
]);
