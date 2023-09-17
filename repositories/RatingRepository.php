<?php

namespace repositories;

use Core\App;

class RatingRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function save($userId, $recipeId, $rating) {
        $statement = "INSERT INTO ratings (user_id, recipe_id, rating) VALUES (:userId, :recipeId, :rating)";
        $this->db->query($statement, [
            'userId' => $userId,
            'recipeId' => $recipeId,
            'rating' => $rating
        ]);
    }

    public function findByUserIdAndRecipeId($userId, $recipeId) {
        $statement = "SELECT * FROM ratings WHERE user_id = :userId AND recipe_id = :recipeId";
        return $this->db->query($statement, [
            'userId' => $userId,
            'recipeId' => $recipeId,
        ])->fetch();
    }

    public function update($id, $rating) {
        $statement = "UPDATE ratings SET rating = :rating WHERE id = :id";
        $this->db->query($statement, [
            'rating' => $rating,
            'id' => $id
        ]);
    }

    public function findByRecipeId($recipeId) {
        $statement = "SELECT rating FROM ratings WHERE recipe_id = :recipeId";
        return $this->db->query($statement, [
              'recipeId' => $recipeId
              ])->fetchAll();
    }

    public function delete($id) {
        $statement = "DELETE FROM ratings WHERE id = :id";
        $this->db->query($statement, [
           'id' => $id
        ]);
    }
}