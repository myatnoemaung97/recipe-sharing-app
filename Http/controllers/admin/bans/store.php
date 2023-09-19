<?php

use Http\services\BanService;
use repositories\ReportRepository;

$banService = new BanService();
$reportRepo = new ReportRepository();

$banService->banUser($_POST['id']);

$reportRepo->setStatus($_POST['reportId'], 'resolved');
$reportRepo->setAction($_POST['reportId'], 'banned');

redirect("/home/admin/reports");