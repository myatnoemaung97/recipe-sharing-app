<?php

namespace Http\services;

use Models\Report;
use repositories\CommentRepository;
use repositories\RecipeRepository;
use repositories\ReportRepository;

class ReportService
{
    protected ReportRepository $reportRepo;
    protected CommentRepository $commentRepo;
    protected RecipeRepository $recipeRepo;
    protected $content = [];

    public function __construct()
    {
        $this->reportRepo = new ReportRepository();
        $this->recipeRepo = new RecipeRepository();
        $this->commentRepo = new CommentRepository();
    }

    public function review(int $id) : void
    {
        $this->reportRepo->setStatus($id, 'in review');
    }

    public function contentExists($report)
    {
        if ($report['content_type'] === 'recipe') {
            $this->content['recipe'] = $this->recipeRepo->findById($report['content_id']);
            if ($this->content['recipe']) {
                $this->content['comments'] = $this->commentRepo->findByRecipeId($this->content['recipe']['id']);
            }

            return (bool) $this->content['recipe'];
        }
        elseif ($report['content_type'] === 'comment') {
            $this->content['comment'] = $this->commentRepo->findById($report['content_id']);
            if ($this->content['comment']) {
                $this->content['recipe'] = $this->recipeRepo->findById(($this->content['comment'])['recipe_id']);
                $this->content['comments'] = $this->commentRepo->findByRecipeId($this->content['comment']['recipe_id']);
            }

            return (bool)$this->content['comment'];
        }
    }

    public function getContent(): array
    {
        return $this->content;
    }





}