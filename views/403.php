<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipe Realm - Home</title>
    <?php require BASE_PATH . 'public/resources/links/links.php' ?>
</head>
<body>
<p style="font-size: 20px;">Sorry. You are not authorized for this action.</p>
<?php if(isset($_SESSION['user'])) : ?>
    <a href="/home">Go back home</a>
<?php else : ?>
    <a href="/">Go back home</a>
<?php endif ?>
</body>