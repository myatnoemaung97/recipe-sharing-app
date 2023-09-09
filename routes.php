<?php

$router->get('/', "index.php")->only('guest');

$router->get('/login', "/sessions/create.php")->only('guest');
$router->post('/login', "/sessions/store.php")->only('guest');
$router->get('/logout', "/sessions/destroy.php");

$router->get('/register', "/registration/create.php")->only('guest');
$router->post('/register', "/registration/store.php")->only('guest');

$router->get('/profile', "profile.php")->only('authenticated');

$router->get('/home', "index.php")->only('authenticated');

$router->get('/recipes/create', "/recipes/create.php")->only('authenticated');
$router->post('/recipes', "/recipes/store.php")->only('authenticated');

$router->get('/recipes', "/recipes/index.php")->only('authenticated');
$router->get('/recipe', "/recipes/show.php");
$router->get('/recipe/edit', "/recipes/edit.php")->only('authenticated');
$router->delete('/recipe/delete', "/recipes/destroy.php")->only('authenticated');
$router->patch('/recipe/patch', "/recipes/update.php")->only('authenticated');
