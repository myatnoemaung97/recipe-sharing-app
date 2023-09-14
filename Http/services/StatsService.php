<?php

namespace Http\services;

use repositories\RecipeRepository;
use repositories\StatsRepo;
use repositories\UserRepository;

class StatsService
{
    protected $userRepo;
    protected $recipeRepo;
    protected $statsRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->recipeRepo = new RecipeRepository();
        $this->statsRepo = new StatsRepo();
    }

    public function getAllTimeUsers() {
        return $this->statsRepo->getUsers();
    }

    public function getCurrentUsers() {
        return count($this->userRepo->findAll());
    }

    public function getAllTimeRecipes() {
        return $this->statsRepo->getRecipes();
    }

    public function getCurrentRecipes() {
        return count($this->recipeRepo->findAll());
    }


}