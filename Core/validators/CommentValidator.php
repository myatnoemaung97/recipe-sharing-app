<?php

namespace Core\validators;

class CommentValidator
{
    public static function validate($attributes) {
        $errors = [];

        if (! Validator::string($attributes['comment'], min: 1)) {
            $errors['name'] = "Comment can't be empty";
        }

        return $errors;
    }
}