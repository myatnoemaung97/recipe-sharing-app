<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

view('/admin/recipes.view.php', [
    'recipes' => $recipeRepo->findAll($_GET['sort'] ?? '')
]);