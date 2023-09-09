<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$recipe = $recipeRepo->findById($_GET['id']);

authorize($_SESSION['user']['id'] === $recipe['user_id']);

view('recipes/edit.view.php', [
    'recipe' => $recipe
]);