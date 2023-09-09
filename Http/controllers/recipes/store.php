<?php

use Core\Session;
use Core\validators\ImageValidator;
use Core\validators\RecipeValidator;
use Http\services\ImageService;
use Models\Recipe;
use repositories\RecipeRepository;

$errors = array_merge(RecipeValidator::validate($_POST), ImageValidator::validate());

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect('/recipes/create');
}

$recipeRepo = new RecipeRepository();

$ingredients = arrayToCsv($_POST['ingredients']);

$image = $_FILES['image'];
$image = ImageService::store($image);

$recipe = new Recipe(
    name: $_POST['name'],
    time: $_POST['time'],
    difficulty: difficultyToInt($_POST['difficulty']),
    description: $_POST['description'],
    instructions: $_POST['instructions'],
    servings: $_POST['servings'],
    userId: $_SESSION['user']['id'],
    ingredients: $ingredients,
    updated: null,
    views: 0,
    created: date('Y-m-d H:i:s'),
    image: $image
);

$recipeRepo->saveRecipe($recipe);

redirect('/home');