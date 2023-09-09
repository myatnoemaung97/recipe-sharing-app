<?php

use repositories\FavouriteRepository;

$favRepo = new FavouriteRepository();
$favRepo->delete($_POST['recipeId']);
