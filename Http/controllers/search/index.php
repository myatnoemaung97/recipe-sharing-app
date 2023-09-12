<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

$recipeRepo->findByParams($_GET);

view('search.view.php');
