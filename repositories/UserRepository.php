<?php
declare(strict_types=1);

namespace repositories;

use Core\App;
use Core\Database;
use Models\User;

class UserRepository
{
    protected Database $db;

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
        $allUsers =  $this->db->query($statement)->fetchAll();
        return array_filter($allUsers,  fn($user) => $user['banned'] !== 1);
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
        $query = "UPDATE users SET name=:name, email=:email, updated=:updated WHERE id=:id";
        $this->db->query($query, [
            'name' => $name,
            'email' => $email,
            'id' => $id,
            'updated' => date('Y-m-d H:i:s')
        ]);
    }

    public function findByAdmin($admin) {
        $query = "SELECT * FROM users WHERE is_admin=:admin";
        return $this->db->query($query, [
           'admin' => $admin
        ])->fetchAll();
    }

    public function delete($id) {
        $query = "DELETE FROM users WHERE id=:id";
        $this->db->query($query, [
            'id' => $id
        ]);
    }

    public function findByBanned() {
        $query = "SELECT * FROM users WHERE banned=1";
        return $this->db->query($query)->fetchAll();
    }

    public function setBanned($id, $value) {
        $query = "UPDATE users SET banned=:banned WHERE id=:id";
        $this->db->query($query, [
            'banned' => $value,
            'id' => $id
        ]);
    }
}