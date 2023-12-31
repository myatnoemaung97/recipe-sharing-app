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
      <div class="content container-fluid" style="max-width: 800px; background-color: #ffffcc;">
        <p class="slogan text-black mb-4 fs-4">Share, Savor, Swap Recipes Together</p>
        <?php if ($recipe) : ?>
          <div class="recipe-image d-flex flex-column align-items-center position-relative">
            <!-- photo -->
            <img id="recipe-image" class="" src="<?= $_FILES['image'] ?? $recipe['image'] ?>" alt="recipe" style="max-width: 100%; max-height: 500px;">
            <!-- /photo -->

            <ul class="text-dark nav nav-underline nav-fill" style="width: 100%;">
              <?php if (loggedIn()) : ?>
                <!-- favourite -->
                <li class="favourite-tab nav-item">
                  <button id="fav-btn" class="<?= $isFavourite === true ? 'hide' : 'show' ?> nav-link" onclick="favourite(<?= $recipe['id'] ?>)" title="Add to favourites">
                    <i class="empty-heart-icon fa-regular fa-heart fa-lg"></i>
                  </button>
                  <button id="unfav-btn" class="<?= $isFavourite === true ? 'show' : 'hide' ?> nav-link" onclick="unfavourite(<?= $recipe['id'] ?>)" title="Remove from favourites">
                    <i class="full-heart-icon fa-solid fa-heart fa-xl"></i>
                  </button>
                </li>
                <!-- /favourite -->

                <!-- rating -->
                <li class="rating-tab nav-item">
                  <button class="nav-link text-black" type="button" data-bs-toggle="modal" data-bs-target="#ratingModal" title="Rate this recipe">
                    <span class="fs-6">My Rating - <span id="userRating" class="fw-semibold"><?= $userRating ?? '' ?></span></span>
                    <i class="star fa-solid fa-star fa-lg"></i>
                  </button>
                  <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this recipe - <span>My Rating - <span id="userRatingModal" class="fw-semibold"><?= $userRating ?? '' ?></span></span></h1>
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
                        <div class="modal-footer d-flex flex-row justify-content-between align-items-center">
                          <?php if ($userRating) : ?>
                            <div class="d-flex flex-column">
                              <button class="btn btn-danger" title="Unrate this recipe" onclick="unrate(<?= $recipe['id'] ?>)">Remove Rating</button>
                            </div>
                          <?php else : ?>
                            <div class="flex-fill"></div>
                          <?php endif; ?>
                          <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="rate(<?= $recipe['id'] ?>)">Rate</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- /rating -->
              <?php endif; ?>
              <li class="info-tab nav-item">
                <button id='info-button' class="nav-link active">Info</button>
              </li>
              <li class="comments-tab nav-item">
                <button id="comments-button" class="nav-link"><span class="text-black">Comments</span></button>
              </li>
            </ul>
          </div>
          <!-- info section -->
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
                  <button class="btn btn-danger" onclick="confirmDeleteRecipe(<?= $recipe['id'] ?>)">Delete Recipe</button>
                </div>
              <?php elseif (loggedIn() && $_SESSION['user']['id'] !== $recipe['user_id']) : ?>
                <!-- recipe report -->
                <!-- Button trigger modal -->
                <a type="button" data-bs-toggle="modal" data-bs-target="#report-recipe-modal<?= $recipe['id'] ?>">
                  <i class="fa-solid fa-flag text-black" title="Report to admin"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="report-recipe-modal<?= $recipe['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Recipe Report</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <select class="form-select mb-2" id="recipe-report-type<?= $recipe['id'] ?>">
                          <option value="" selected>Reason for report</option>
                          <option value="spam">Spam</option>
                          <option value="copyrights_infringement">Copyrights Infringement</option>
                          <option value="inappropriate_content">Inappropriate Content</option>
                          <option value="others">Others</option>
                        </select>
                        <textarea id="recipe-report-description<?= $recipe['id'] ?>" class="form-control" placeholder="Provide additional information"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="report(<?= $recipe['id'] ?>, 'recipe', <?= $_SESSION['user']['id'] ?>, <?= $recipe['user_id'] ?>)">Report</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /recipe report -->
              <?php endif; ?>
            </div>
            <p><?= htmlspecialchars($recipe['description']) ?></p>
            <p><span class="fw-semibold">Author: </span> <?= htmlspecialchars($author['name']) ?></p>
            <p><span class="fw-semibold">Cooking Time:</span> <?= htmlspecialchars($recipe['time']) ?> minutes</p>
            <p><span class="fw-semibold">Difficulty:</span> <?= intToDifficulty($recipe['difficulty']) ?></p>
            <p><span class="fw-semibold">Servings:</span> <?= $recipe['servings'] ?></p>
            <p><span class="fw-semibold">Ingredients:</span> <?= htmlspecialchars($recipe['ingredients']) ?></p>
            <div class="lh-base">
              <p class="fs-5 fw-semibold">Instructions:</p>
              <p><?= htmlspecialchars($recipe['instructions']) ?></p>
            </div>

          </div>
          <!-- /info section -->

          <!--comments start -->
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
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] || (loggedIn() && $comment['user_id'] === $_SESSION['user']['id'])) : ?>
                      <div>
                        <i class="pointer-cursor fa-regular fa-pen-to-square me-2" title="Edit comment" onclick="editComment(<?= $comment['id'] ?>)"></i>
                        <i class="pointer-cursor fa-solid fa-trash me-2" title="Delete comment" onclick="deleteComment(<?= $comment['id'] ?>, <?= $recipe['id'] ?>)"></i>
                      </div>
                    <?php elseif (isset($_SESSION['admin']) && $_SESSION['admin'] || (loggedIn() && $comment['user_id'] !== $_SESSION['user']['id'])) : ?>
                      <!-- comment report -->
                      <!-- Button trigger modal -->
                      <a type="button" data-bs-toggle="modal" data-bs-target="#report-comment-modal<?= $comment['id'] ?>">
                        <i class="fa-solid fa-flag text-black" title="Report to admin"></i>
                      </a>

                      <!-- Modal -->
                      <div class="modal fade" id="report-comment-modal<?= $comment['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Comment Report</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <select class="form-select mb-2" id="comment-report-type<?= $comment['id'] ?>">
                                <option value="" selected>Reason for report</option>
                                <option value="spam">Spam</option>
                                <option value="copyrights_infringement">Copyrights Infringement</option>
                                <option value="inappropriate_content">Inappropriate Content</option>
                                <option value="others">Others</option>
                              </select>
                              <textarea id="comment-report-description<?= $comment['id'] ?>" class="form-control" placeholder="Provide additional information"></textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-success" onclick="report(<?= $comment['id'] ?>, 'comment', <?= $_SESSION['user']['id'] ?>, <?= $comment['user_id'] ?>)">Report</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /comment report -->
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
          <!-- comments end -->
        <?php else : ?>
          <?php $link = isset($_SESSION['user']) ? '/home' : '/' ?>
          <p class="text-center fs-4">This recipe doesn't exist. Go <a href="<?= $link ?>">home</a></p>
        <?php endif; ?>
      </div>
    </div>
  </main>
  <footer>
    <?php require base_path("views/partials/footer.view.php") ?>
  </footer>
</body>