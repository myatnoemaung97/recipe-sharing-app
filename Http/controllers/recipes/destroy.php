<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();
$recipeRepo->deleteById($_POST['recipeId']);

