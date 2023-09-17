<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Yum Share - Home</title>
  <?php require BASE_PATH . 'public/resources/links/links.php' ?>
</head>

<body>
  <header>
    <?php require 'partials/nav.view.php' ?>
  </header>
  <main>
    <div class="content">
      <?php require base_path("/views/search/search.view.php") ?>
      <div class="container mt-5">
        <div id="recipes-section" class="row">
          <?php foreach ($recipes as $recipe) : ?>
            <div class="col-12 col-md-4 col-lg-3">
              <a class="no-underline" href="/recipe?id=<?= $recipe['id'] ?>">
                <div class="recipe-card card mb-3" style="background-color: #ffffcc;">
                  <img src='<?= $recipe['image'] ?>' class="card-img-top bg-white" alt="recipe" style="height: 210px ;">
                  <div class="card-body lh-1">
                    <p class="heading card-title fs-4 fw-semibold"><?= $recipe['name'] ?></p>
                    <div class="d-flex flex-row justify-content-between mt-3">
                      <div class="d-flex flex-row gap-2">
                        <p><i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($recipe['time']) ?> mins</p>
                        <p><i class="fa-solid fa-trophy me-1"></i><?= htmlspecialchars(intToDifficulty($recipe['difficulty'])) ?></p>
                      </div>
                      <div>
                        <?php if (isset($recipe['rating'])) : ?>
                          <?php for ($i = 1; $i <= $recipe['rating']; $i++) : ?>
                            <i class="star fa-solid fa-star"></i>
                          <?php endfor; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- pagination -->
        <div class="d-flex flex-row justify-content-end">
          <nav class="pagination" aria-label="Page navigation example">
            <ul class="pagination">
              <?php for ($i = 1; $i <= $pages; $i++) : ?>
                <li class="page-item"><a class="page-link" onclick="turnPage(<?= $i ?>)"><?= $i ?></a></li>
              <?php endfor; ?>
            </ul>
          </nav>
        </div>
        <!-- /pagination -->
      </div>
    </div>
  </main>
  <footer>
    <?php require base_path("views/partials/footer.view.php") ?>
  </footer>
</body>