<?php

use repositories\UserRepository;

$userRepo = new UserRepository();

authorize($_SESSION['user']['id'] == $_POST['id'] || $_SESSION['admin'], 403);

$userRepo->delete($_POST['id']);

if (!$_SESSION['admin']) {
    logout();
}
