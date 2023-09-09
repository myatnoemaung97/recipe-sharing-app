<?php

namespace Core\validators;

class ImageValidator
{

    public static function validate() {

        $errors = [];

        if (!Validator::isFileSelected('image')) {
            $errors['image'] = "Please choose an image";
        }

        if (Validator::isFileSelected('image')) {
            if (!Validator::imageType($_FILES['image'])) {
                $errors['image'] = "The image type is not supported";
            }
        }

        return $errors;
    }
}