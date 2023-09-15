<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

$recipe = $recipeRepo->findById($_POST['id']);

authorize($_SESSION['user']['id'] == $recipe['user_id'] || $_SESSION['admin'], 403);

$recipeRepo->delete($_POST['id']);

