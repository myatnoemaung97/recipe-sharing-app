<?php

use repositories\ReportRepository;

$reportRepo = new ReportRepository();


view("admin/reports/index.view.php", [
    'pending' => $reportRepo->findByStatus('pending'),
    'inReview' => $reportRepo->findByStatus('in review'),
    'resolved' => $reportRepo->findByStatus('resolved'),
    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);