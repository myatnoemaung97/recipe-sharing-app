<?php

use repositories\CommentRepository;
use repositories\FavouriteRepository;
use repositories\RatingRepository;
use repositories\RecipeRepository;
use repositories\UserRepository;

$recipeRepo = new RecipeRepository();
$favRepo = new FavouriteRepository();
$ratingRepo = new RatingRepository();
$commentRepo = new CommentRepository();
$userRepo = new UserRepository();

$recipeId = $_GET['id'];

$recipeRepo->updateView($recipeId);
$recipe = $recipeRepo->findById($recipeId);

$isFavourite = false;
$userRating = false;

if (isset($_SESSION['user'])) {
    $isFavourite = (bool) $favRepo->findByUserIdAndRecipeId($_SESSION['user']['id'], $recipeId);
    $userRating = $ratingRepo->findByUserIdAndRecipeId($_SESSION['user']['id'], $recipeId);
}

$comments = $commentRepo->findByRecipeId($recipeId);

view('/recipes/show.view.php',[
    'recipe' => $recipe,
    'isFavourite' => $isFavourite,
    'userRating' => $userRating ? $userRating['rating'] : '',
    'comments' => $comments,
    'author' => $userRepo->findById($recipe['user_id'])
]);