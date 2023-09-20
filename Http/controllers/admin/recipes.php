<?php

use repositories\RecipeRepository;
use repositories\ReportRepository;

$recipeRepo = new RecipeRepository();
$reportRepo = new ReportRepository();

view('/admin/recipes.view.php', [
    'recipes' => $recipeRepo->findAll(sort: $_GET['sort'] ?? '', includeBanned: true),
    'pendingNoti' => count($reportRepo->findByStatus('pending'))
]);