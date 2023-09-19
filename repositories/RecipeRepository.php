<?php
declare(strict_types=1);

namespace repositories;

use Core\App;
use Core\Database;

class RecipeRepository
{
    protected Database $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function saveRecipe($recipe): void
    {
        $statement = 'insert into recipes (name, instructions, description, servings, difficulty, views, image, user_id, created, time, updated, ingredients) 
                        values (:name, :instructions, :description, :servings, :difficulty, :views, :image, :user_id, :created, :time, :updated, :ingredients)';

        $this->db->query($statement, [
            'name' => $recipe->getName(),
            'instructions' => $recipe->getInstructions(),
            'description' => $recipe->getDescription(),
            'servings' => $recipe->getServings(),
            'difficulty' => $recipe->getDifficulty(),
            'views' => $recipe->getViews(),
            'image' => $recipe->getImage(),
            'user_id' => $recipe->getUserId(),
            'created' => $recipe->getCreated(),
            'time' => $recipe->getTime(),
            'updated' => $recipe->getUpdated(),
            'ingredients' => $recipe->getIngredients()
            ]);
    }

    public function findAll(string $sort = '', bool $includeBanned = false) {
        $banFilter = $includeBanned ? '' : "WHERE users.banned = 0";
        $statement = "SELECT recipes.* FROM recipes INNER JOIN users ON recipes.user_id = users.id $banFilter ORDER BY " . (empty($sort) ? 'id' : $sort);
        return $this->db->query($statement)->fetchAll();
    }

    public function findByUserId(int $userId) {
        $statement = "SELECT * FROM recipes WHERE user_id = :userId";
        return $this->db->query($statement, [
            'userId' => $userId
        ])->fetchAll();
    }

    public function findById(int $recipeId) {
        $statement = "SELECT * FROM recipes WHERE id = :id";
        return $this->db->query($statement, [
           'id' => $recipeId
        ])->fetch();
    }

    public function delete(int $id): void
    {
        $statement = "DELETE FROM recipes WHERE id = :id";
        $this->db->query($statement, [
            'id' => $id
        ]);
    }

    public function updateRecipe($attributes): void
    {

        $statement = 'UPDATE recipes SET  ';

        foreach ($attributes as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $statement = $statement . $key . '=:' . $key . ',';
        }
        $statement = substr($statement, 0, -1);

        $statement = $statement . ' WHERE id=:id';

        $this->db->query($statement, $attributes);
    }

    public function updateView(int $id): void
    {
        $recipe = $this->findById($id);
        if (!$recipe) {
            return;
        }
        $views = $recipe['views'];
        $attributes = [
            'views' => $views + 1,
            'id' => $id
        ];
        $this->updateRecipe($attributes);
    }

    public function updateRating(int $id, int $rating): void
    {
        $attributes = [
            'rating' => $rating,
            'id' => $id
        ];
        $this->updateRecipe($attributes);
    }

    public function findByParams(string $query, $params = []) {
        return $this->db->query($query, $params)->fetchAll();
    }

    public function updateImage($image, $id): void
    {
        $query = "UPDATE recipes SET image = :image WHERE id =:id ";
        $this->db->query($query, [
            'image' => $image,
            'id' => $id
        ]);
    }

}