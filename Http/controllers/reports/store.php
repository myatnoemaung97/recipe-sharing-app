<?php

use Http\services\LinkBuilder;
use Models\Report;
use repositories\ReportRepository;

$reportRepo = new ReportRepository();
$linkBuilder = new LinkBuilder();

$reportRepo->save(new Report(
    userId: $_POST['userId'],
    contentId: $_POST['contentId'],
    contentType: $_POST['contentType'],
    authorId: $_POST['authorId'],
    reportType: $_POST['reportType'],
    description: $_POST['description'],
    date: date('Y-m-d H:i:s'),
    status: 'pending',
    link: $linkBuilder->buildLink($_POST['contentType'], $_POST['contentId'])
));
