<?php

use Http\services\RatingService;
use repositories\RatingRepository;

$ratingRepo = new RatingRepository();
$ratingService = new RatingService();

$userId = $_SESSION['user']['id'];
$recipeId = $_POST['recipeId'];
$userRating = $_POST['rating'];

$rating = $ratingRepo->findByUserIdAndRecipeId($userId, $recipeId);

if ($rating) {
    $ratingRepo->update($rating['id'], $userRating);
} else {
    $ratingRepo->save($userId, $recipeId, $userRating);
}

$ratingService->setRating($recipeId);

$response = [
    'userRating' => $userRating,
];

header('Content-Type: application/json');

echo json_encode($response);
exit();