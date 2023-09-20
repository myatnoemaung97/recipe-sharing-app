<?php

use Http\services\StatsService;
use repositories\AdminRepository;
use repositories\ReportRepository;

$adminRepo = new AdminRepository();
$statsService = new StatsService();
$reportRepo = new ReportRepository();

authorize($adminRepo->findByUserId($_SESSION['user']['id']), 403);

view('admin/index.view.php', [
    'users' => [
        'allTime' => $statsService->getAllTimeUsers(),
        'current' => $statsService->getCurrentUsers(),
        'thisWeek' => $statsService->getThisWeekUsers()
    ],

    'recipes' => [
        'allTime' => $statsService->getAllTimeRecipes(),
        'current' => $statsService->getCurrentRecipes(),
        'thisWeek' => $statsService->getThisWeekRecipes()
    ],

    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);