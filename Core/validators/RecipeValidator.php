<?php

namespace Core\validators;

class RecipeValidator
{
    public static function validate($attributes) {
        $errors = [];

        if (! Validator::string($attributes['name'], min: 1)) {
            $errors['name'] = "Name can't be empty";
        }

        if (! Validator::onlyNumbers($attributes['time'])) {
            $errors['time'] = "Time must be in numbers only";
        }

        if (! Validator::string($attributes['time'])) {
            $errors['time'] = "Time can't be empty";
        }

        if (! Validator::string($attributes['difficulty'])) {
            $errors['difficulty'] = "Please choose a difficulty";
        }

        if (! Validator::onlyNumbers($attributes['servings'])) {
            $errors['servings'] = "Servings must be in numbers only";
        }

        if (! Validator::string($attributes['servings'])) {
            $errors['servings'] = "Servings can't be empty";
        }

        if (! Validator::string($attributes['instructions'])) {
            $errors['instructions'] = "Instructions can't be empty";
        }

        if (!self::hasIngredientsInput($_POST)) {
            $errors['ingredients'] = "Ingredients can't be empty";
        }



//        if (!self::validateIngredients($attributes['ingredients'])) {
//            $errors['ingredients'] = "Ingredients can't be empty";
//        }

        return $errors;
    }

    private static function validateIngredients($ingredients) {
        foreach ($ingredients[0] as $value) {
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }

    private static function hasIngredientsInput($formData) {
        if (isset($formData['ingredients']) && is_array($formData['ingredients'])) {
            // Check if the "ingredients" field is set and is an array
            foreach ($formData['ingredients'] as $ingredient) {
                if (!empty($ingredient)) {
                    // If at least one ingredient is not empty, return true
                    return true;
                }
            }
        }

        // If no ingredients are provided or they are all empty, return false
        return false;
    }


}