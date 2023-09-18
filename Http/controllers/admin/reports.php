<?php

use repositories\ReportRepository;

$reportRepo = new ReportRepository();

view("admin/reports.view.php", [
    'reports' => $reportRepo->findAll()
]);