<?php

use repositories\CommentRepository;
use repositories\FavouriteRepository;
use repositories\RatingRepository;
use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$favRepo = new FavouriteRepository();
$ratingRepo = new RatingRepository();
$commentRepo = new CommentRepository();

$recipeRepo->updateView($_GET['id']);
$recipe = $recipeRepo->findById($_GET['id']);

$isFavourite = false;

if (isset($_SESSION['user'])) {
    $isFavourite = (bool) $favRepo->findByUserIdAndRecipeId($_SESSION['user']['id'], $_GET['id']);
}

$userRating = $ratingRepo->findByUserIdAndRecipeId($_SESSION['user']['id'], $_GET['id']);

$comments = $commentRepo->findByRecipeId($_GET['id']);

view('/recipes/show.view.php',[
    'recipe' => $recipe,
    'isFavourite' => $isFavourite,
    'userRating' => $userRating ? $userRating['rating'] : '',
    'comments' => $comments
]);