<?php

use repositories\ReportRepository;
use repositories\UserRepository;

$userRepo = new UserRepository();
$reportRepo = new ReportRepository();

view("/admin/users.view.php", [
    'users' => $userRepo->findAll($_GET['sort'] ?? ''),
    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);
