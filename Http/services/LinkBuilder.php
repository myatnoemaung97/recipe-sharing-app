<?php

namespace Http\services;

use repositories\CommentRepository;
use repositories\RecipeRepository;

class LinkBuilder
{

    protected CommentRepository $commentRepo;
    protected RecipeRepository $recipeRepo;

    public function __construct()
    {
        $this->recipeRepo = new RecipeRepository();
        $this->commentRepo = new CommentRepository();
    }

    public function buildLink(string $contentType, int $contentId) : string
    {
        $link = '';

        if ($contentType === 'recipe') {
            $link .= "/recipes?id=$contentId";
        }
    }


}