<?php

use Http\services\ImageService;
use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

$image = ImageService::store($_FILES['image']);

$recipeRepo->updateImage($image, $_POST['recipeId']);