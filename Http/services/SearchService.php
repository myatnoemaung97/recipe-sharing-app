<?php

namespace Http\services;

use repositories\RecipeRepository;

class SearchService
{
    protected RecipeRepository $recipeRepo;

    public function __construct()
    {
        $this->recipeRepo = new RecipeRepository();
    }

    public function searchByParams($params) {

        return $this->recipeRepo->findByParams($this->buildQuery($params), $params);
    }

    private function buildQuery($params) {
        $statement = "SELECT * FROM recipes";

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

            if ($key === 'difficulty') {
                if ($value == 0) {
                    $statement = $statement . $key . '>' . ':' . $key . ' AND ';
                    continue;
                }
                $statement = $statement . $key . "=" . ":" . $key . " AND ";
                continue;
            }

            $statement = $statement . $key . "=" . ":" . $key . " AND ";
        }


        return substr($statement, 0, -5);
    }

}