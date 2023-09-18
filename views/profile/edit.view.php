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
            <h3 class="heading text-center mt-5">Update Profile</h3>
            <form class="px-2" style="max-width: 600px; margin: auto; padding-top: 50px;" action="/profile/update?id=<?= $_SESSION['user']['id'] ?>" method="POST">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <label>Name</label>
                <input class="form-control" type="text" name="name" value="<?= $_SESSION['_flash']['old']['name'] ?? $user['name'] ?? '' ?>">
                <?php if (isset($_SESSION['_flash']['errors']['name'])) : ?>
                    <p class="warning"><?= $_SESSION['_flash']['errors']['name'] ?></p>
                <?php endif; ?>
                <label class="mt-3">Email</label>
                <input class="form-control" type="text" name="email" value="<?= $_SESSION['_flash']['old']['email'] ?? $user['email'] ?? '' ?>">
                <?php if (isset($_SESSION['_flash']['errors']['email'])) : ?>
                    <p class="warning"><?= $_SESSION['_flash']['errors']['email'] ?></p>
                <?php endif; ?>
                <label class="mt-3">Confirm Password</label>
                <input class="form-control" type="password" name="password">
                <?php if (isset($_SESSION['_flash']['errors']['password'])) : ?>
                    <p class="warning"><?= $_SESSION['_flash']['errors']['password'] ?></p>
                <?php endif; ?>
                <div class="d-flex flex-row justify-content-start gap-2 mt-3">
                    <button class="btn btn-success" type="submit">Save</button>
                    <a class="btn btn-secondary" href="/profile?id=<?= $_SESSION['user']['id'] ?>">Cancel</a>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php require base_path("views/partials/footer.view.php") ?>
    </footer>
</body>