<?php

namespace repositories;

use Core\App;

class AdminRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function findByUserId($id) {
        $query = "SELECT * FROM admins WHERE user_id = :id";
        return $this->db->query($query, [
            'id' => $id
        ])->fetch();
    }

    public function save($id) {
        $query = "INSERT INTO admins (user_id) VALUES (:user_id)";
        $this->db->query($query, [
            'user_id' => $id
        ]);
    }
}