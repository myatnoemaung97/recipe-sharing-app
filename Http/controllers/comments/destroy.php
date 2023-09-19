<?php

use repositories\CommentRepository;
use repositories\ReportRepository;

$commentRepo = new CommentRepository();
$reportRepo = new ReportRepository();

$commentRepo->deleteById($_POST['id']);

if (isset($_POST['reportId'])) {
    $reportRepo->setStatus($_POST['reportId'], 'resolved');
    $reportRepo->setAction($_POST['reportId'], 'deleted');
    redirect("/home/admin/reports");
}

$comments = $commentRepo->findByRecipeId($_POST['recipeId']);

$response = [
    'commentCount' => count($comments),
    'comments' => $comments,
    'userSessionId' => $_SESSION['user']['id'],
    'admin' => $_SESSION['admin'],
    'recipeId' => $_POST['recipeId']
];

header('Content-Type: application/json');

echo json_encode($response);