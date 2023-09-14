<?php

namespace Core;

use repositories\UserRepository;

class Authenticator
{
    public static function authenticateByEmail($email, $password) {
        $userRepo = new UserRepository();
        $user = $userRepo->findByEmail($email);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return null;
    }

    public static function authenticateById($id, $password) {
        $userRepo = new UserRepository();
        $user = $userRepo->findById($id);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return null;
    }
}