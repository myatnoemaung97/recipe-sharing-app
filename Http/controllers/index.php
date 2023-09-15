<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

view('index.view.php',[
    'recipes' => $recipeRepo->findAll()
]);