<?php

use repositories\FavouriteRepository;
use repositories\RecipeRepository;

$favRepo = new FavouriteRepository();
$recipeRepo = new RecipeRepository();

$favourites = $favRepo->findByUserId($_SESSION['user']['id']);
$recipes = [];
foreach ($favourites as $favourite) {
    $recipes[] = $recipeRepo->findById($favourite['recipe_id']);
}

view('recipes/index.view.php', [
    'recipes' => $recipes
]);
