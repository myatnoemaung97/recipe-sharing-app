<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <?php require BASE_PATH . 'public/resources/links/links.php' ?>
</head>

<body>
<header>
    <?php require base_path('views/partials/nav.view.php') ?>
</header>
<main>
    <div class="content">
        <form style="max-width: 600px; margin: auto; padding-top: 50px;" action="/profile/update?id=<?= $_SESSION['user']['id'] ?>" method="POST">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="<?= $_SESSION['_flash']['old']['name'] ?? '' ?>">
            <?php if (isset($_SESSION['_flash']['errors']['name'])) : ?>
                <p class="warning"><?= $_SESSION['_flash']['errors']['name'] ?></p>
            <?php endif; ?>
            <label class="mt-3">Email</label>
            <input class="form-control" type="text" name="email" value="<?= $_SESSION['_flash']['old']['email'] ?? '' ?>">
            <?php if (isset($_SESSION['_flash']['errors']['email'])) : ?>
                <p class="warning"><?= $_SESSION['_flash']['errors']['email'] ?></p>
            <?php endif; ?>
            <label class="mt-3">Confirm Password</label>
            <input class="form-control" type="password" name="password">
            <?php if (isset($_SESSION['_flash']['errors']['password'])) : ?>
                <p class="warning"><?= $_SESSION['_flash']['errors']['password'] ?></p>
            <?php endif; ?>
            <button class="btn btn-success mt-3">Save</button>
        </form>
    </div>
</main>

</body>