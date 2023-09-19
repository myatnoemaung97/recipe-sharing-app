<?php

namespace repositories;

use Core\App;
use Core\Database;
use Models\Comment;

class CommentRepository
{
    protected Database $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function save(Comment $comment) {
        $statement = "INSERT INTO comments (user_id, recipe_id, comment, created, updated) VALUES (:user_id, :recipe_id, :comment, :created, :updated)";
        $this->db->query($statement, [
           'user_id' => $comment->getUserId(),
            'recipe_id' => $comment->getRecipeId(),
            'comment' => $comment->getComment(),
            'created' => $comment->getCreated(),
            'updated' => $comment->getUpdated()
        ]);

        return $this->findLastInserted();
    }

    public function findByRecipeId(int $recipeId) : array {
        $statement = "SELECT comments.*,users.name as user_name FROM comments INNER JOIN users ON comments.user_id=users.id WHERE users.banned=0 AND recipe_id = :recipeId";
        return $this->db->query($statement, [
           'recipeId' => $recipeId
        ])->fetchAll();
    }

    public function findLastInserted() {
        $query = "SELECT * FROM comments ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->fetch();
    }

    public function deleteById(int $id): void
    {
        $statement = "DELETE FROM comments WHERE id = :id";
        $this->db->query($statement, [
            'id' => $id
        ]);
    }

    public function findAll() : array {
        $statement = "SELECT * FROM comments";
        return $this->db->query($statement)->fetchAll();
    }

    public function updateComment(int $id, string $comment): void
    {
        $statement = "UPDATE comments SET comment = :comment WHERE id = :id";
        $this->db->query($statement, [
            'id' => $id,
            'comment' => $comment
        ]);
    }

    public function findById(int $id) {
        $query = "SELECT * FROM comments WHERE id=:id";
        return $this->db->query($query, [
            'id' => $id
        ])->fetch();
    }
}