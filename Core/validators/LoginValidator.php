<?php

namespace Core\validators;

class LoginValidator
{
    public static function validate($email, $password) {
        $errors = [];

        if (! Validator::string($password, min: 5)) {
            $errors['password'] = "Password must be at least 5 characters long";
        }
        if (! Validator::email($email)) {
            $errors['email'] = "Please enter a valid email address";
        }

        return $errors;
    }
}