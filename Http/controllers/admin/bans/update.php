<?php

use repositories\ReportRepository;

$reportRepo = new ReportRepository();

$reportRepo->setStatus($_POST['id'], 'resolved');
$reportRepo->setAction($_POST['id'], 'none');

redirect("/home/admin/reports");