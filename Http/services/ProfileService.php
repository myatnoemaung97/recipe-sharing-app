<?php

namespace Http\services;

use repositories\CommentRepository;
use repositories\RecipeRepository;
use repositories\UserRepository;

class ProfileService
{
    protected RecipeRepository $recipeRepo;
    protected CommentRepository $commentRepo;
    protected UserRepository $userRepo;
    protected $info = [];
    protected $topRated;
    protected $mostViewed;
    protected $mostComments;
    protected $commentsCount;
    protected $user;

    public function __construct()
    {
        $this->recipeRepo = new RecipeRepository();
        $this->commentRepo = new CommentRepository();
        $this->userRepo = new UserRepository();
    }

    public function processProfile($userId) {
        $this->user = $this->userRepo->findById($userId);

        $recipes = $this->recipeRepo->findByUserId($userId);
        if (empty($recipes)) {
            return;
        }

        $views = 0;
        $totalRatings = 0;
        $ratedRecipes = 0;
        $topRated = $recipes[0];
        $mostViewed = $recipes[0];
        $comments = [];

        foreach ($recipes as $recipe) {
            $views += $recipe['views'];
            if ($recipe['rating'] !== 0) {
                $ratedRecipes++;
                $totalRatings += $recipe['rating'];
            }

            if ($recipe['rating'] > $topRated['rating']) {
                $topRated = $recipe;
            } elseif ($recipe['rating'] === $topRated['rating'] && $recipe['views'] > $topRated['views']) {
                $topRated = $recipe;
            }

            if ($recipe['views'] > $mostViewed['views']) {
                $mostViewed = $recipe;
            } elseif ($recipe['views'] === $mostViewed['views'] && $recipe['rating'] > $mostViewed['rating']) {
                $mostViewed = $recipe;
            }

            $commentsCount = count($this->commentRepo->findByRecipeId($recipe['id']));
            $comments[$recipe['id']] = $commentsCount;
        }

        $mostComments = null;
        $commentsCount = null;

        foreach ($comments as $key => $value) {
            if ($commentsCount === null || $value > $commentsCount) {
                $commentsCount = $value;
                $mostComments = $key;
            }
        }

        $mostComments = $this->recipeRepo->findById($mostComments);

        $avgRating = 0;
        if ($ratedRecipes !== 0) {
            $avgRating = $totalRatings / $ratedRecipes;
        }

        $this->info = [
            'recipesCount' => count($recipes),
            'totalViews' => $views,
            'avgRating' => $avgRating
        ];

        $this->topRated = $topRated;
        $this->mostViewed = $mostViewed;
        $this->mostComments = $mostComments;
        $this->commentsCount = $commentsCount;
    }

    public function getProfileInfo() {
        return $this->info;
    }

    public function getTopRated() {
        return $this->topRated;
    }

    public function getMostViewed() {
        return $this->mostViewed;
    }

    public function getMostComments() {
        return $this->mostComments;
    }

    public function getCommentsCount() {
        return $this->commentsCount;
    }

    public function getUser() {
        return $this->user;
    }



}