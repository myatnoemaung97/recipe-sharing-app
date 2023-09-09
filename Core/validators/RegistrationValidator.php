<?php

namespace Core\validators;

class RegistrationValidator {
    public static function validate($name, $email, $password) {
        $errors = [];

        if (! Validator::string($name)) {
            $errors['name'] = 'Name cannot be empty';
        }
        if (! Validator::string($password, min: 5)) {
            $errors['password'] = "Password must be at least 5 characters long";
        }
        if (! Validator::email($email)) {
            $errors['email'] = "Please enter a valid email address";
        }

        return $errors;
    }
}