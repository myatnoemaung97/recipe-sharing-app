<?php

use Http\services\SearchService;

$searchService = new SearchService();

$params = getParams($_GET);

$recipes = $searchService->searchByParams($params);

view('/search/index.view.php', [
    'recipes' => $recipes
]);
