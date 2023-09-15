<?php


use Http\services\ImageService;
use repositories\RecipeRepository;

$recipeRepo = new RecipeRepository();

$image = $_POST['image'];

$image = ImageService::store($image);

$recipeRepo->updateImage($image, $_POST['recipeId']);