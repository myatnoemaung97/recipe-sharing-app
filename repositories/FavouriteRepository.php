<?php

namespace repositories;

use Core\App;

class FavouriteRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function findByUserId($id) {
        $statement = "SELECT * FROM favourites WHERE user_id=:id";
        return $this->db->query($statement, [
                'id' => $id
                ])->fetchAll();
    }

    public function findByUserIdAndRecipeId($userId, $recipeId) {
        $statement = "SELECT * FROM favourites WHERE user_id=:userId AND recipe_id=:recipeId";
        return $this->db->query($statement, [
            'userId' => $userId,
            'recipeId' => $recipeId
        ])->fetch();
    }

    public function save($recipeId) {
        $statement = "INSERT INTO favourites(user_id, recipe_id) VALUES (:userId, :recipeId)";
        $this->db->query($statement, [
            'userId' => $_SESSION['user']['id'],
            'recipeId' => $recipeId
        ]);
    }

    public function delete($recipeId) {
        $statement = "DELETE FROM favourites WHERE user_id = :userId AND recipe_id = :recipeId";
        $this->db->query($statement, [
            'userId' => $_SESSION['user']['id'],
            'recipeId' => $recipeId
        ]);
    }
}