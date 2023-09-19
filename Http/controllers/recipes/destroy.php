<?php

use repositories\RecipeRepository;
use repositories\ReportRepository;

$recipeRepo = new RecipeRepository();
$reportRepo = new ReportRepository();

$recipe = $recipeRepo->findById($_POST['id']);

authorize($_SESSION['admin'] || $_SESSION['user']['id'] == $recipe['user_id'], 403);

$recipeRepo->delete($_POST['id']);

if (isset($_POST['reportId'])) {
    $reportRepo->setStatus($_POST['reportId'], 'resolved');
    $reportRepo->setAction($_POST['reportId'], 'deleted');
}

redirect("/home/admin/reports");

