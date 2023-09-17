<?php

use Http\services\RatingService;
use repositories\RatingRepository;

$ratingRepo = new RatingRepository();
$ratingService = new RatingService();

$userId = $_SESSION['user']['id'];
$recipeId = $_POST['recipeId'];

$rating = $ratingRepo->findByUserIdAndRecipeId($userId, $recipeId);

if ($rating) {
    $ratingRepo->delete($rating['id']);
}

$ratingService->setRating($recipeId);
