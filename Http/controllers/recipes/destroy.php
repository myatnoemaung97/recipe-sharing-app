<?php

use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

$recipe = $recipeRepo->findById($_POST['id']);

authorize($_SESSION['admin'] || $_SESSION['user']['id'] == $recipe['user_id'], 403);

$recipeRepo->delete($_POST['id']);

