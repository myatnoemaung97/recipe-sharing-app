<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipe Realm - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>
    <?php require BASE_PATH . "resources/styles/index.style.php"?>
</head>
<body>
<p style="font-size: 20px;">Sorry. Page not found.</p>
<?php if(isset($_SESSION['user'])) : ?>
    <a href="/home">Go back home</a>
<?php else : ?>
    <a href="/">Go back home</a>
<?php endif ?>
</body>