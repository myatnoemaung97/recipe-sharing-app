<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <?php require BASE_PATH . 'public/resources/links/links.php' ?>
</head>

<body>
    <header>
        <?php require base_path('views/partials/nav.view.php') ?>
    </header>
    <main>
        <div class="content container-fluid" style="max-width: 800px; background-color: #ffffcc ;">
            <h1 class="heading text-center mb-3">Profile</h1>
            <div class="d-flex flex-row justify-content-evenly align-items-center" style="width: 100%;">
                <div class="d-flex flex-row justify-content-evenly align-items-center gap-3">
                    <div class="" style="width: 75px; height: 75px; border-radius: 25px; background-image: url(/resources/images/user-avatar.png); background-position: center; background-size: cover;"></div>
                    <div class="d-flex flex-column   lh-1">
                        <p><?= $user['name'] ?></p>
                        <p><?= $user['email'] ?></p>
                        <a class="btn btn-sm btn-success" href="/profile/edit?id=<?= $_SESSION['user']['id']?>">Edit</a>
                    </div>
                </div>
                <div class="">
                    <p>Total Recipes - <?= isset($info['recipesCount']) ? $info['recipesCount'] : 0?></p>
                    <p>Total Views - <?= isset($info['totalViews']) ? $info['totalViews'] : 0 ?></p>
                    <p>Average rating - <?= isset($info['avgRating']) ? $info['avgRating'] : 0 ?></p>
                </div>
            </div>
            <?php if (empty($info)) : ?>
                <p class="text-center mt-3">You don't have any recipe. <a href="/recipes/create">Create</a> a recipe now</p>
            <?php else : ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <a class="no-underline" href="/recipe?id=">
                            <div class="recipe-card card mb-3" style="background-color: #ffffcc;">
                                <h5 class="card-header heading fw-semibold">Top Rated</h5>
                                <img src=<?= $topRated['image'] ?> class="card-img-top bg-white" alt="recipe" style="height: 210px ;">
                                <div class="card-body lh-1">
                                    <h5 class="heading card-title fs-5"><?= htmlspecialchars($topRated['name']) ?></h5>
                                    <div class="d-flex flex-column justify-content-between mt-3">
                                        <div class="d-flex flex-row gap-2">
                                            <p><i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($topRated['time']) ?> mins</p>
                                            <p><i class="fa-solid fa-trophy me-1"></i><?= htmlspecialchars(intToDifficulty($topRated['difficulty'])) ?></p>
                                        </div>
                                        <div>
                                            <?php for ($i = 1; $i <= $topRated['rating']; $i++) : ?>
                                                <i class="star fa-solid fa-star fa-lg"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4">
                        <a class="no-underline" href="/recipe?id=">
                            <div class="recipe-card card mb-3" style="background-color: #ffffcc;">
                                <h5 class="card-header heading fw-semibold">Most Viewed - <?= $mostViewed['views'] ?> <i class="fa-regular fa-eye text-" style="color: rgba(0,0,0,0.4);"></i></h5>
                                <img src=<?= $mostViewed['image'] ?> class="card-img-top bg-white" alt="recipe" style="height: 210px ;">
                                <div class="card-body lh-1">
                                    <h5 class="heading card-title fs-5"><?= htmlspecialchars($mostViewed['name']) ?></h5>
                                    <div class="d-flex flex-column justify-content-between mt-3">
                                        <div class="d-flex flex-row gap-2">
                                            <p><i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($mostViewed['time']) ?> mins</p>
                                            <p><i class="fa-solid fa-trophy me-1"></i><?= htmlspecialchars(intToDifficulty($mostViewed['difficulty'])) ?></p>
                                        </div>
                                        <div>
                                            <?php for ($i = 1; $i <= $mostViewed['rating']; $i++) : ?>
                                                <i class="star fa-solid fa-star fa-lg"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4">
                        <a class="no-underline" href="/recipe?id=">
                            <div class="recipe-card card mb-3" style="background-color: #ffffcc;">
                                <h5 class="card-header heading fw-semibold">Most Comments - <?= $commentsCount ?></h5>
                                <img src=<?= $mostComments['image'] ?> class="card-img-top bg-white" alt="recipe" style="height: 210px ;">
                                <div class="card-body lh-1">
                                    <h5 class="heading card-title fs-5"><?= htmlspecialchars($mostComments['name']) ?></h5>
                                    <div class="d-flex flex-column justify-content-between mt-3">
                                        <div class="d-flex flex-row gap-2">
                                            <p><i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($mostComments['time']) ?> mins</p>
                                            <p><i class="fa-solid fa-trophy me-1"></i><?= htmlspecialchars(intToDifficulty($mostComments['difficulty'])) ?></p>
                                        </div>
                                        <div>
                                            <?php for ($i = 1; $i <= $mostComments['rating']; $i++) : ?>
                                                <i class="star fa-solid fa-star fa-lg"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>

</body>