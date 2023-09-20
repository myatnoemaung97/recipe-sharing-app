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
    <header>
        <?php require base_path('views/partials/nav.view.php') ?>
    </header>
    <main>
        <div class="d-flex justify-content-center container-fluid">
            <div class="d-flex flex-column justify-content-center align-items-center content container-fluid" style="max-width: 800px; background-color: #ffffcc;">
                <p style="font-size: 20px;">Sorry. Page not found.</p>
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="/home">Go back home</a>
                <?php else : ?>
                    <a href="/">Go back home</a>
                <?php endif ?>
                <img class="text-center mt-3" src="/resources/images/empty plate.png" alt="" style="width: 300px; height: 300px; opacity: 40%;">
            </div>
        </div>
    </main>
    <footer>
        <?php require base_path("views/partials/footer.view.php") ?>
    </footer>
</body>