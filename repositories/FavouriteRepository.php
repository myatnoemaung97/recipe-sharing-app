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

    public function findByRecipeId($id) {

    }
}