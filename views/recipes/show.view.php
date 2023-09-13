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
                    <?php if (loggedIn() && $_SESSION['user']['id'] === $recipe['user_id']) : ?>
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
                    <ul class="text-dark nav nav-underline nav-fill" style="width: 100%;">
                        <?php if (loggedIn()) : ?>
                            <li class="favourite-tab nav-item">
                                <button id="fav-btn" class="<?= $isFavourite === true ? 'hide' : 'show' ?> nav-link" onclick="favourite(<?= $recipe['id'] ?>)" title="Add to favourites">
                                    <i class="empty-heart-icon fa-regular fa-heart fa-lg"></i>
                                </button>
                                <button id="unfav-btn" class="<?= $isFavourite === true ? 'show' : 'hide' ?> nav-link" onclick="unfavourite(<?= $recipe['id'] ?>)" title="Remove from favourites">
                                    <i class="full-heart-icon fa-solid fa-heart fa-xl"></i>
                                </button>
                            </li>
                            <li class="rating-tab nav-item">
                                <button class="nav-link text-black" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Rate this recipe">
                                    <span class="fs-6">My Rating - <span id="userRating" class="fw-semibold"><?= $userRating ?? '' ?></span></span>
                                    <i class="star fa-solid fa-star fa-lg"></i>
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
                                                    <div class="star1" onmouseover="star1()" onmouseleave="star0()" onclick="starClicked(1)">
                                                        <i id="star1-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star1-full" class="star hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                    <div class="star2" onmouseover="star2()" onmouseleave="star0()" onclick="starClicked(2)">
                                                        <i id="star2-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star2-full" class="star hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                    <div class="star3" onmouseover="star3()" onmouseleave="star0()" onclick="starClicked(3)">
                                                        <i id="star3-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star3-full" class="star hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                    <div class="star4" onmouseover="star4()" onmouseleave="star0()" onclick="starClicked(4)">
                                                        <i id="star4-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star4-full" class="star hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                    <div class="star5" onmouseover="star5()" onmouseleave="star0()" onclick="starClicked(5)">
                                                        <i id="star5-empty" class="star empty fa-regular fa-star fa-2xl ms-1"></i>
                                                        <i id="star5-full" class="star hide fa-solid fa-star fa-2xl ms-1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success" onclick="rate(<?= $recipe['id'] ?>)">Rate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li class="info-tab nav-item">
                            <button id='info-button' class="nav-link active">Info</button>
                        </li>
                        <li class="comments-tab nav-item">
                            <button id="comments-button" class="nav-link"><span class="text-black">Comments</span></button>
                        </li>
                    </ul>
                </div>
                <div class="info text-start lh-1 p-2" id="info-section">
                    <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                        <div class="d-flex flex-column gap-1 mb-3">
                            <p class="fw-semibold fs-3"><?= htmlspecialchars($recipe['name']) ?></p>
                            <div class="d-flex flex-row">
                                <div class="me-2">
                                    <?php if (isset($recipe['rating'])) : ?>
                                        <?php for ($i = 1; $i <= $recipe['rating']; $i++) : ?>
                                            <i class="star fa-solid fa-star fa-xl"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </div>
                                <div style="color: rgba(0, 0, 0, 0.7);">
                                    <i class="fa-solid fa-eye fa-lg"></i>
                                    <span><?= $recipe['views'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if (loggedIn() && $_SESSION['user']['id'] === $recipe['user_id']) : ?>
                            <div>
                                <a class="btn btn-success" href="/recipe/edit?id=<?= $recipe['id'] ?>">Edit Info</a>
                                <button class="btn btn-danger" onclick="confirmDelete(<?= $recipe['id'] ?>)">Delete Recipe</button>
                            </div>
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
                <div class="comments hide" id="comments-section">
                    <div class="d-flex flex-row justify-content-between">
                        <p class="fw-semibold"><span id="comment-count"><?= count($comments) ?></span> Comments</p>
                        <?php if (!loggedIn()) : ?>
                            <a class="" href="/login">Login</a>
                        <?php endif; ?>
                    </div>
                    <hr class="mb-3" style="margin-top: -5px;">
                    <div>
                        <?php if (loggedIn()) : ?>
                            <textarea id="comment-input" class="form-control mb-1" placeholder="Leave a comment about the recipe..."></textarea>
                            <p id="error-message" class="hide" style="font-size: 14px;"><span id="message"></span></p>
                            <div class="text-end">
                                <button class="btn btn-sm btn-success mb-2" onclick="comment(<?= $recipe['id'] ?>)">Comment</button>
                            </div>
                        <?php endif; ?>
                        <div id="comments">
                            <?php foreach ($comments as $key => $comment) : ?>
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="lh-1">
                                        <p class="fw-bold text-success" style="font-size: 18px;"><?= $comment['user_name'] ?></p>
                                        <p style="margin-top: -10px; font-size: 12px; color: rgba(0, 0, 0, 0.7);"><?= $comment['created'] ?></p>
                                        <p style="font-size: 14px;"><?= $comment['comment'] ?></p>
                                    </div>
                                    <?php if (loggedIn() && $comment['user_id'] === $_SESSION['user']['id']) : ?>
                                        <div>
                                            <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(<?= $comment['id'] ?>)"></i>
                                            <i class="pointer-cursor fa-solid fa-trash" title="Delete comment" onclick="deleteComment(<?= $comment['id'] ?>, <?= $recipe['id'] ?>)"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div id="comment-edit<?= $comment['id'] ?>" class="hide">
                                    <textarea id="edit-input<?= $comment['id'] ?>" class="form-control mb-2" placeholder="Leave a comment about the recipe..."><?= $comment['comment'] ?></textarea>
                                    <button class="btn btn-sm btn-success" onclick="updateComment(<?= $comment['id'] ?>, <?= $recipe['id'] ?>)">Save</button>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>