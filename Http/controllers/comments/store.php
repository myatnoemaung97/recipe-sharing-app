<?php

use Core\validators\Validator;
use Models\Comment;
use repositories\CommentRepository;

if (!Validator::string($_POST['comment'])) {
    $response = [
        'error' => "Comment can't be empty."
    ];
    http_response_code(400);

    header('Content-Type: application/json');

    echo json_encode($response);
    exit();
}

$commentRepo = new CommentRepository();
$comment = new Comment(
    userId: $_SESSION['user']['id'],
    recipeId: $_POST['recipeId'],
    comment: $_POST['comment'],
    created: date('Y-m-d H:i:s'),
    updated: null
);
$newComment = $commentRepo->save($comment);

$comments = $commentRepo->findByRecipeId($comment->getRecipeId());

$response = [
    'commentCount' => count($comments),
    'comments' => $comments,
    'userSessionId' => $_SESSION['user']['id'],
    'admin' => $_SESSION['admin'],
    'recipeId' => $_POST['recipeId']
];

header('Content-Type: application/json');

echo json_encode($response);