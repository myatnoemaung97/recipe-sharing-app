<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$recipes = $recipeRepo->findByUserId($_SESSION['user']['id']);

view('/recipes/index.view.php', [
    'recipes' => $recipes
]);