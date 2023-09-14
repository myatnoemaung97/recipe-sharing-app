<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$recipes = $recipeRepo->findAll();

view('index.view.php',[
    'recipes' => $recipes
]);