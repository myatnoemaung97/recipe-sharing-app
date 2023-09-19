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
try {
    $recipes = $searchService->searchByParams($params, $order);
}
catch (PDOException $exception) {
    abort(404);
}

view('/search/index.view.php', [
    'recipes' => $recipes
]);
