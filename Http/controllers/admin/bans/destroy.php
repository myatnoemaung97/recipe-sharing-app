<?php

use Http\services\BanService;

$banService = new BanService();

$banService->unbanUser($_POST['id']);

redirect($_SERVER['HTTP_REFERER']);