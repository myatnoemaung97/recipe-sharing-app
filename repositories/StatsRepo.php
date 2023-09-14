<?php

namespace repositories;

use Core\App;

class StatsRepo
{
    protected $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function updateUsers() {
        $query = "UPDATE stats set users = :users";
        $this->db->query($query, [
            'users' => $this->getUsers() + 1
        ]);
    }

    public function updateRecipes() {
        $query = "UPDATE stats set recipes = :recipes";
        $this->db->query($query, [
            'recipes' => $this->getRecipes() + 1
        ]);
    }

    public function getUsers() {
        $query = "SELECT users FROM stats";
        return ($this->db->query($query)->fetch())['users'];
    }

    public function getRecipes() {
        $query = "SELECT recipes FROM stats";
        return ($this->db->query($query)->fetch())['recipes'];
    }

}