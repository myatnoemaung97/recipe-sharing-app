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
            <div class="content container-fluid" style="max-width: 800px; background-color: #ffffcc ;">
                <p class="slogan text-black mb-4 fs-4">Share, Savor, Swap Recipes Together</p>
                <div class="recipe-image d-flex flex-column align-items-center position-relative">
                    <img id="recipe-image" class="" src="<?= $_FILES['image'] ?? $recipe['image'] ?>" alt="recipe" style="max-width: 100%; max-height: 500px;">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if ($_SESSION['user']['id'] === $recipe['user_id']) : ?>
                            <form action="/recipe/patch?id=<?= $recipe['id'] ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <label for="image-upload" class="change-photo-button btn btn-success btn-sm me-2">
                                        Change Photo
                                    </label>
                                    <input type="file" id="image-upload" style="display: none;" onchange="updateImagePreview()">
                                    <button id="save-photo-button" class="save-photo-button btn btn-danger btn-sm d-none">Save Photo</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                    <ul class="text-dark nav nav-underline nav-fill" style="width: 100%;">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li class="favourite-tab nav-item">
                                <button id="fav-btn" class="<?= $isFavourite === true ? 'hide' : 'show' ?> nav-link" onclick="favourite(<?= $recipe['id'] ?>)" title="Add to favourites">
                                    <i class="empty-heart-icon fa-regular fa-heart fa-lg"></i>
                                </button>
                                <button id="unfav-btn" class="<?= $isFavourite === true ? 'show' : 'hide' ?> nav-link" onclick="unfavourite(<?= $recipe['id'] ?>)" title="Remove from favourites">
                                    <i class="full-heart-icon fa-solid fa-heart fa-lg"></i>
                                </button>
                            </li>
                            <li class="rating-tab nav-item" title="Rate this recipe">
                                <button class="nav-link text-black" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="fs-6">My Rating</span>
                                    <i class="star fa-solid fa-star fa-lg ms-1"></i>
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this recipe</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex flex-row justify-content-center gap-2">
                                                    <div class="star1">
                                                        <i id="star1-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star1-full" class="star two-stars hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                    <div class="star2" onmouseover="star2()">
                                                        <i id="star2-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star2-full" class="star two-stars hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Rate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li class="info-tab nav-item">
                            <button class="nav-link active">Info</button>
                        </li>
                        <li class="comments-tab nav-item">
                            <button class="nav-link"><span class="text-black">Comments</span></button>
                        </li>
                    </ul>
                </div>
                <div class="info text-start lh-1 p-2" id="info-section">
                    <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                        <div class="d-flex flex-column gap-1 mb-3">
                            <p class="fw-semibold fs-3"><?= htmlspecialchars($recipe['name']) ?></p>
                            <div class="d-flex flex-row">
                                <div class="me-2">
                                    <i class="star fa-solid fa-star fa-xl"></i>
                                    <i class="star fa-solid fa-star fa-xl"></i>
                                    <i class="star fa-solid fa-star fa-xl"></i>
                                    <i class="star fa-solid fa-star fa-xl"></i>
                                    <i class="star fa-solid fa-star fa-xl"></i>
                                </div>
                                <div style="color: rgba(0, 0, 0, 0.7);">
                                    <i class="fa-solid fa-eye fa-lg"></i>
                                    <span><?= $recipe['views'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($_SESSION['user']['id'] === $recipe['user_id']) : ?>
                                <div>
                                    <a class="btn btn-success" href="/recipe/edit?id=<?= $recipe['id'] ?>">Edit Info</a>
                                    <button class="btn btn-danger" onclick="confirmDelete(<?= $recipe['id'] ?>)">Delete Recipe</button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <p><?= htmlspecialchars($recipe['description']) ?></p>
                    <p><span class="fw-semibold">Cooking Time:</span> <?= htmlspecialchars($recipe['time']) ?> minutes</p>
                    <p><span class="fw-semibold">Difficulty:</span> <?= intToDifficulty($recipe['difficulty']) ?></p>
                    <p><span class="fw-semibold">Servings:</span> <?= $recipe['servings'] ?></p>
                    <p><span class="fw-semibold">Ingredients:</span> <?= htmlspecialchars($recipe['ingredients']) ?></p>
                    <div class="lh-base">
                        <p class="fs-5 fw-semibold">Instructions:</p>
                        <p><?= htmlspecialchars($recipe['instructions']) ?></p>
                    </div>

                </div>
                <div class="comments" id="comments-section">

                </div>
            </div>
        </div>
    </main>
    <script src="/resources/js/recipe.js"></script>
</body>