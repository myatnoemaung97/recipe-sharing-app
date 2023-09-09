<?php

use repositories\FavouriteRepository;
use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$favRepo = new FavouriteRepository();

$recipeRepo->updateView($_GET['id']);
$recipe = $recipeRepo->findById($_GET['id']);

$isFavourite = false;

if (isset($_SESSION['user'])) {
    $isFavourite = (bool) $favRepo->findByUserIdAndRecipeId($_SESSION['user']['id'], $_GET['id']);
}

view('/recipes/show.view.php',[
    'recipe' => $recipe,
    'isFavourite' => $isFavourite
]);