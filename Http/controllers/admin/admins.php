<?php

use repositories\ReportRepository;
use repositories\UserRepository;

$userRepo = new UserRepository();
$reportRepo = new ReportRepository();

view('/admin/admins.view.php', [
    'admins' => $userRepo->findByAdmin(1),
    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);
