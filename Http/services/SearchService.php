<?php
declare(strict_types=1);

namespace Http\services;

use repositories\RecipeRepository;

class SearchService
{
    protected RecipeRepository $recipeRepo;

    public function __construct()
    {
        $this->recipeRepo = new RecipeRepository();
    }

    public function searchByParams($params, $order = '') {
        return $this->recipeRepo->findByParams($this->buildQuery($params, $order), array_values($params));
    }

    private function buildQuery($params, $order = '') {
        $statement = "SELECT recipes.* FROM recipes INNER JOIN users ON recipes.user_id=users.id WHERE users.banned=0";

        if (empty($params)) {
            return $statement;
        }

        $statement = $this->bindParams($statement, $params);
        $statement = $this->bindOrder($statement, $order);

        return $statement;
    }

    private function bindOrder($query, $order) {
        return $query . " ORDER BY recipes.$order" . ' DESC';
    }

    private function bindParams($query, $params) {
        $query .=  ' AND ';

        foreach ($params as $key => $value) {

            if ($key === 'name') {
                $query .= 'recipes.'.$key . " LIKE ?" . " AND ";
                continue;
            }
            if ($key === 'time') {
                $query .= 'recipes.'.$key . "< ?" . " AND ";
                continue;
            }

            if ($key === 'difficulty') {
                if ($value == 0) {
                    $query .= 'recipes.'.$key . '> ?' . ' AND ';
                    continue;
                }
                $query .= 'recipes.'.$key . "= ?" . " AND ";
                continue;
            }

            $query .= 'recipes.'.$key . "= ?" . " AND ";
        }

        return substr($query, 0, -5);
    }
}