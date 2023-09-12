<?php

use repositories\CommentRepository;

$commentRepo = new CommentRepository();

$commentRepo->deleteById($_POST['id']);

$comments = $commentRepo->findByRecipeId($_POST['recipeId']);

$response = [
    'commentCount' => count($comments),
    'comments' => $comments,
    'userSessionId' => $_SESSION['user']['id'],
    'recipeId' => $_POST['recipeId']
];

header('Content-Type: application/json');

echo json_encode($response);