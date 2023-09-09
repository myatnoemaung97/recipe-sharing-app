<?php

namespace Models;

class Recipe
{
    protected $name;
    protected $time;
    protected $difficulty;
    protected $description;
    protected $instructions;
    protected $servings;
    protected $views;
    protected $userId;
    protected $created;
    protected $updated;
    protected $image;
    protected $ingredients;

    public function __construct($name, $time, $difficulty, $description, $instructions, $servings, $userId, $ingredients, $updated, $views = null, $created = null, $image = null)
    {
        $this->name = $name;
        $this->time = $time;
        $this->difficulty = $difficulty;
        $this->description = $description;
        $this->instructions = $instructions;
        $this->servings = $servings;
        $this->views = $views;
        $this->userId = $userId;
        $this->created = $created;
        $this->image = $image;
        $this->ingredients = $ingredients;
        $this->updated = $updated;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time): void
    {
        $this->time = $time;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function setDifficulty($difficulty): void
    {
        $this->difficulty = $difficulty;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }

    public function setInstructions($instructions): void
    {
        $this->instructions = $instructions;
    }

    public function getServings()
    {
        return $this->servings;
    }

    public function setServings($servings): void
    {
        $this->servings = $servings;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function setViews($views): void
    {
        $this->views = $views;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created): void
    {
        $this->created = $created;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated($updated): void
    {
        $this->updated = $updated;
    }


}