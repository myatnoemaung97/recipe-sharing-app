<?php

namespace Models;

class Comment
{
    protected $userId;
    protected $recipeId;
    protected $comment;
    protected $created;
    protected $updated;
    protected $userName;

    public function __construct($userId, $recipeId, $comment, $created, $updated, $userName)
    {
        $this->userId = $userId;
        $this->recipeId = $recipeId;
        $this->comment = $comment;
        $this->created = $created;
        $this->updated = $updated;
        $this->userName = $userName;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function getRecipeId()
    {
        return $this->recipeId;
    }

    public function setRecipeId($recipeId): void
    {
        $this->recipeId = $recipeId;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created): void
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated): void
    {
        $this->updated = $updated;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }




}