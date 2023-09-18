<?php

use repositories\ReportRepository;

$reportRepo = new ReportRepository();

view("admin/reports/index.view.php", [
    'pendingReports' => $reportRepo->findByStatus('pending')
]);