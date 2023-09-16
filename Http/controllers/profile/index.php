<?php

use Http\services\ProfileService;

$profileService = new ProfileService();

authorize($_SESSION['user']['id'] === $_GET['id'], 403);

$profileService->processProfile($_GET['id']);

view('/profile/index.view.php', [
    'user' => $profileService->getUser(),
    'info' => $profileService->getProfileInfo(),
    'topRated' => $profileService->getTopRated(),
    'mostViewed' => $profileService->getMostViewed(),
    'mostComments' => $profileService->getMostComments(),
    'commentsCount' => $profileService->getCommentsCount()
]);