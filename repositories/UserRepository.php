<?php

namespace repositories;

use Core\App;
use Models\User;

class UserRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function save(User $user) {
        $statement = 'insert into users (name, email, password, created) values (:name, :email, :password, :created)';
        $result = $this->db->query($statement, [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            'created' => date('Y-m-d H:i:s' )]);

        return $this->findLastInserted();
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $user = $this->db->query($query, [
            'email' => $email
        ])->fetch();
        return $user;
    }

    public function findById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $user = $this->db->query($query, [
            'id' => $id
        ])->fetch();
        return $user;
    }

    public function findLastInserted() {
        $query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->fetch();
    }
}