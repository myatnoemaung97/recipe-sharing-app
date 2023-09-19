<?php
declare(strict_types=1);

namespace Http\services;

use Models\User;
use repositories\StatsRepo;
use repositories\UserRepository;

class RegistrationService
{

    protected UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function bannedUser(string $email): bool
    {
        $user = $this->userRepo->findByEmail($email);
        return $user['banned'] === 1;
    }

    public function emailExists(string $email): bool
    {
        return (bool)$this->userRepo->findByEmail($email);
    }

    public function register($user) {
        $userRepo = new UserRepository();
        $user = new User($user['name'], $user['email'], $user['password']);
        $user = $userRepo->save($user);

        login($user);

        $_SESSION['admin'] = false;

        $statsRepo = new StatsRepo();
        $statsRepo->updateUsers();
    }
}