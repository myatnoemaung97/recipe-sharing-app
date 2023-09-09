<?php

use repositories\FavouriteRepository;

$favRepo = new FavouriteRepository();
$favRepo->save($_POST['recipeId']);