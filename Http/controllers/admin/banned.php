<?php

use repositories\ReportRepository;
use repositories\UserRepository;

$userRepo = new UserRepository();
$reportRepo = new ReportRepository();

view("/admin/banned.view.php", [
    'users' => $userRepo->findByBanned(),
    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);
