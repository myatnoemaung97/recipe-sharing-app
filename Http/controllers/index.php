<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$recipes = $recipeRepo->findAllRecipes();

view('index.view.php',[
    'recipes' => $recipes
]);