<?php
declare(strict_types=1);

namespace Http\services;

use repositories\UserRepository;

class BanService
{
    protected UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function banUser(int $id): void
    {
        $this->userRepo->setBanned($id, 1);
    }

    public function unbanUser(int $id): void
    {
        $this->userRepo->setBanned($id, 0);
    }

}