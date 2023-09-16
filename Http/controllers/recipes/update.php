<?php

use Core\Session;
use Core\validators\RecipeValidator;
use Models\Recipe;
use repositories\RecipeRepository;

$errors = RecipeValidator::validate($_POST);

if (\Core\validators\Validator::isFileSelected('image')) {
    $errors = array_merge($errors, \Core\validators\ImageValidator::validate());
}

$query = parse_url($_SERVER['HTTP_REFERER'])['query'];
parse_str($query, $result);

if (!empty($errors)) {
    Session::flashErrorsAndOldData($errors, $_POST);
    redirect("/recipe/edit?id=". $result['id']);
}

$attributes = [
    'name' => $_POST['name'],
    'time' => $_POST['time'],
    'difficulty' => difficultyToInt($_POST['difficulty']),
    'description' => $_POST['description'],
    'instructions' => $_POST['instructions'],
    'servings' => $_POST['servings'],
    'ingredients' => arrayToCsv($_POST['ingredients']),
    'updated' => date('Y-m-d H:i:s'),
    'id' => $result['id']
];

if (\Core\validators\Validator::isFileSelected('image')) {
    $attributes['image'] = \Http\services\ImageService::store($_FILES['image']);
}

$recipeRepo = new RecipeRepository();
$recipeRepo->updateRecipe($attributes);

redirect('/recipe?id=' . $result['id']);

