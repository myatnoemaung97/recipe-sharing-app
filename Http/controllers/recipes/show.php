<?php

use repositories\FavouriteRepository;
use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$favRepo = new FavouriteRepository();

$recipeRepo->updateView($_GET['id']);
$recipe = $recipeRepo->findById($_GET['id']);

$isFavourite = false;

$favourites = $favRepo->findByUserId($_SESSION['user']['id']);
if (!empty($favourites)) {

}

view('/recipes/show.view.php',[
    'recipe' => $recipe
]);