<?php

use Http\services\PaginationService;
use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$pagination = new PaginationService();

$recipes = $recipeRepo->findAll();

view('index.view.php',[
    'recipes' => $recipes,
    'pages' => $pagination->pages($recipes, 8)
]);