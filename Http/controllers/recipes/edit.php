<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$recipe = $recipeRepo->findById($_GET['id']);

view('recipes/edit.view.php', [
    'recipe' => $recipe
]);