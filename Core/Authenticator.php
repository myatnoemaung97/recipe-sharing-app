<?php

namespace Core;

use repositories\UserRepository;

class Authenticator
{
    public static function authenticate($email, $password) {
        $userRepo = new UserRepository();
        $user = $userRepo->findByEmail($email);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return null;
    }
}