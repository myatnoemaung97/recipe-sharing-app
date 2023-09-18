<?php

use repositories\CommentRepository;
use repositories\RecipeRepository;
use repositories\ReportRepository;

$reportRepo = new ReportRepository();
$recipeRepo = new RecipeRepository();
$commentRepo = new CommentRepository();

$report = $reportRepo->findById($_GET['id']);

$recipe = [];

if ($report['content_type'] === 'recipe') {
    $recipe = $recipeRepo->findById($report['content_id']);
} elseif ($report['content_type'] === 'comment') {
    $comment = $commentRepo->findById($report['content_id']);
    $recipe = $recipeRepo->findById($comment['recipe_id']);
}

$comments = [];

if (!empty($recipe)) {
    $comments = $commentRepo->findByRecipeId($recipe['id']);
}

if (empty($recipe) || empty($comments)) {
    $reportRepo->delete($report['id']);
    redirect("/home/admin/reports");

}

view("admin/reports/show.view.php", [
    'report' => $report,
    'recipe' => $recipe,
    'comments' => $comments
]);