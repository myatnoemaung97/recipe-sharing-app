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
    <div class="content">
      <div class="text-white" style="height: 220px; margin-top: -13px; background-color: #636161;">
        <p class="slogan text-black mb-4 fs-4">Share, Savor, Swap Recipes Together</p>
        <div class="d-flex justify-content-center">
          <form id="search-form" action="/search" method="GET">
            <div class="d-flex flex-column mb-2 gap-1">
              <label for="name">Name:</label>
              <input class="form-control" type="text" name='name' id='name' value=<?= $_GET['name'] ?? '' ?>>
            </div>

            <div class="d-flex flex-row justify-content-between gap-3">
              <div class="d-flex flex-column gap-1">
                <label for="time">Time:</label>
                <select class="form-select" name="time" id="time">
                  <option value=999 selected>All</option>
                  <option value=15>Under 15 mins</option>
                  <option value=30>Under 30 mins</option>
                  <option value=45>Under 45 mins</option>
                  <option value=60>Under 1 hr</option>
                  <option value=90>Under 1:30 hr</option>
                  <option value=120>Under 2 hr</option>
                </select>
              </div>

              <div class="d-flex flex-column gap-1">
                <label for="difficulty">Difficulty:</label>
                <select class="form-select" name="difficulty" id="difficulty">
                  <option value=0 selected>All</option>
                  <option value=1>Easy</option>
                  <option value=2>Medium</option>
                  <option value=3>Hard</option>
                </select>
              </div>

              <div class="d-flex flex-column gap-1">
                <label for="servings">Servings:</label>
                <input class="form-control" type="number" name="servings" id="servings">
              </div>

              <div class="d-flex flex-column gap-1">
                <label for="">Order By:</label>
                <select class="form-select" name="" id="">
                  <option value="">New</option>
                  <option value="">Ratings</option>
                  <option value="">Views</option>
                </select>
              </div>

              <div class="d-flex flex-column">
                <div class="flex-fill" for=""></div>
                <button type="submit" class="btn btn-success">Search</button>
              </div>

            </div>
          </form>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row">
          <?php foreach ($recipes as $recipe) : ?>
            <div class="col-12 col-md-4 col-lg-3">
              <a class="no-underline" href="/recipe?id=<?= $recipe['id'] ?>">
                <div class="recipe-card card mb-3" style="background-color: #ffffcc;">
                  <img src='<?= $recipe['image'] ?>' class="card-img-top bg-white" alt="recipe" style="height: 210px ;">
                  <div class="card-body lh-1">
                    <h5 class="heading card-title fs-3"><?= $recipe['name'] ?></h5>
                    <div class="d-flex flex-row justify-content-between mt-3">
                      <div class="d-flex flex-row gap-2">
                        <p><i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($recipe['time']) ?> mins</p>
                        <p><i class="fa-solid fa-trophy me-1"></i><?= htmlspecialchars(intToDifficulty($recipe['difficulty'])) ?></p>
                      </div>
                      <div>
                        <?php if (isset($recipe['rating'])) : ?>
                          <?php for ($i = 1; $i <= $recipe['rating']; $i++) : ?>
                            <i class="star fa-solid fa-star fa-lg"></i>
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
      </div>
    </div>
  </main>
</body>