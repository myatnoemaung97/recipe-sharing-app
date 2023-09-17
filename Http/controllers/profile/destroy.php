<?php

use repositories\UserRepository;

$userRepo = new UserRepository();

authorize($_SESSION['admin'] || $_SESSION['user']['id'] == $_POST['id'] , 403);

$userRepo->delete($_POST['id']);

if (!$_SESSION['admin']) {
    logout();
}
