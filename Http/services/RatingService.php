<?php

namespace Http\services;

use repositories\RatingRepository;
use repositories\RecipeRepository;

class RatingService
{

    protected $recipeRepo;
    protected $ratingRepo;

    public function __construct()
    {
        $this->recipeRepo = new RecipeRepository();
        $this->ratingRepo = new RatingRepository();
    }

    public function setRating($recipeId) {
        $ratings = $this->ratingRepo->findByRecipeId($recipeId);
        if (!$ratings) {
            $this->recipeRepo->updateRating($recipeId, 0);
            return;
        }

        $ratingSum = 0;
        foreach ($ratings as $rating) {
            $ratingSum += $rating['rating'];
        }
        $ratingCount = count($ratings);
        $avgRating = round($ratingSum / $ratingCount);
        $this->recipeRepo->updateRating($recipeId, $avgRating);
    }

}