<?php

namespace repositories;

use Core\App;

class RecipeRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = App::getContainer()->resolve('Core\Database');
    }

    public function saveRecipe($recipe) {
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

    public function findAllRecipes() {
        $statement = 'SELECT * FROM recipes';
        return $this->db->query($statement)->fetchAll();
    }

    public function findByUserId($userId) {
        $statement = "SELECT * FROM recipes WHERE user_id = :userId";
        return $this->db->query($statement, [
            'userId' => $userId
        ])->fetchAll();
    }

    public function findById($recipeId) {
        $statement = "SELECT * FROM recipes WHERE id = :id";
        return $this->db->query($statement, [
           'id' => $recipeId
        ])->fetch();
    }

    public function deleteById($id) {
        $statement = "DELETE FROM recipes WHERE id = :id";
        $this->db->query($statement, [
            'id' => $id
        ]);
    }

    public function updateRecipe($attributes) {

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

    public function updateView($id) {
        $recipe = $this->findById($id);
        $views = $recipe['views'];
        $attributes = [
            'views' => $views + 1,
            'id' => $id
        ];
        $this->updateRecipe($attributes);
    }

    public function updateRating($id, $rating) {
        $attributes = [
            'rating' => $rating,
            'id' => $id
        ];
        $this->updateRecipe($attributes);
    }

    public function findByParams($params = []) {
        $statement = "SELECT * FROM recipes";

        if (!empty($params)) {
            $statement = $statement . " WHERE ";
            foreach ($params as $key => $value) {
                if ($key === 'name') {
                    $statement = $statement . $key . " LIKE " . ":" . $key . " AND ";
                    continue;
                }
                if ($key === 'time') {
                    $statement = $statement . $key . "<" . ":" . $key . " AND ";
                    continue;
                }
                $statement = $statement . $key . "=" . ":" . $key . " AND ";
            }
        }

        $statement = substr($statement, 0, -5);

        dd($statement);
    }
}