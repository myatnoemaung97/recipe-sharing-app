<?php

use Http\services\ReportService;
use repositories\ReportRepository;

$reportRepo = new ReportRepository();
$reportService = new ReportService();

$report = $reportRepo->findById($_GET['id']);

if (!$reportService->contentExists($report)) {
    $reportRepo->delete($report['id']);
    redirect("/home/admin/reports");
}

$reportService->review($report['id']);

view("admin/reports/show.view.php", [
    'report' => $report,
    'recipe' => $reportService->getContent()['recipe'],
    'comments' => $reportService->getContent()['comments'],
    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);