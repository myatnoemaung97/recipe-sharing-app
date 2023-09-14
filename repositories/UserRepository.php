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
        $statement = 'insert into users (name, email, password, created, is_admin) values (:name, :email, :password, :created, :is_admin)';
        $result = $this->db->query($statement, [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            'created' => date('Y-m-d H:i:s' ),
            'is_admin' => $user->getIsAdmin()
            ]);

        return $this->findLastInserted();
    }

    public function findAll($sort = '') {
        $statement = "SELECT * FROM users ORDER BY " . (empty($sort) ? 'id' : $sort);
        return $this->db->query($statement)->fetchAll();
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

    public function update($id, $name, $email) {
        $query = "UPDATE users SET name=:name, email=:email WHERE id=:id";
        $this->db->query($query, [
            'name' => $name,
            'email' => $email,
            'id' => $id
        ]);
    }

    public function findByAdmin($admin) {
        $query = "SELECT * FROM users WHERE is_admin=:admin";
        return $this->db->query($query, [
           'admin' => $admin
        ])->fetchAll();
    }
}