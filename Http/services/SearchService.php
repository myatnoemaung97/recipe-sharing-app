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

    public function searchByParams($params, $order = '') {
        return $this->recipeRepo->findByParams($this->buildQuery($params, $order), array_values($params));
    }

    private function buildQuery($params, $order = '') {
        $statement = "SELECT * FROM recipes";

        if (empty($params)) {
            return $statement;
        }

        $statement = $this->bindParams($statement, $params);
        $statement = $this->bindOrder($statement, $order);

        return $statement;
    }

    private function bindOrder($query, $order) {
        return $query . " ORDER BY $order" . ' DESC';
    }

    private function bindParams($query, $params) {
        $query .=  ' WHERE ';

        foreach ($params as $key => $value) {

            if ($key === 'name') {
                $query .= $key . " LIKE ?" . " AND ";
                continue;
            }
            if ($key === 'time') {
                $query .= $key . "< ?" . " AND ";
                continue;
            }

            if ($key === 'difficulty') {
                if ($value == 0) {
                    $query .= $key . '> ?' . ' AND ';
                    continue;
                }
                $query .= $key . "= ?" . " AND ";
                continue;
            }

            $query .= $key . "= ?" . " AND ";
        }

        return substr($query, 0, -5);
    }
}