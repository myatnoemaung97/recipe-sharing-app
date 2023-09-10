<?php

use repositories\RatingRepository;

$ratingRepo = new RatingRepository();
$rating = $ratingRepo->findByUserIdAndRecipeId($_SESSION['user']['id'], $_POST['recipeId']);

if ($rating) {
    $ratingRepo->update($rating['id'], $_POST['rating']);
} else {
    $ratingRepo->save($_SESSION['user']['id'], $_POST['recipeId'], $_POST['rating']);
}
