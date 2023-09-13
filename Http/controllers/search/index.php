<?php

use Http\services\SearchService;

$searchService = new SearchService();

$params = getParams($_GET);
$order = '';
if (isset($params['sort'])) {
    $order = $params['sort'];
    unset($params['sort']);
}

if (isset($params['name'])) {
    $params['name'] = '%' . $params['name'] . '%';
}

$recipes = $searchService->searchByParams($params, $order);

view('/search/index.view.php', [
    'recipes' => $recipes
]);
