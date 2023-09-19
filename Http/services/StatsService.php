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
    protected $dateTimeService;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->recipeRepo = new RecipeRepository();
        $this->statsRepo = new StatsRepo();
        $this->dateTimeService = new DateTimeService();
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
        return count($this->recipeRepo->findAll(includeBanned: true));
    }

    public function getThisWeekUsers() {
        $allUsers = $this->userRepo->findAll();
        $thisWeekUsers = $this->dateTimeService->filter($allUsers, 7);
        return count($thisWeekUsers);
    }

    public function getThisWeekRecipes() {
        $allRecipes = $this->recipeRepo->findAll(includeBanned: true);
        $thisWeekRecipes = $this->dateTimeService->filter($allRecipes, 7);
        return count($thisWeekRecipes);
    }


}