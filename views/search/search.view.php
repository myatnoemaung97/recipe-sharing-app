<!-- search start -->
<div class="text-white px-2" style="height: 220px; margin-top: -13px; background-color: #b31914;">
  <p class="slogan text-black pt-2 mb-3 fs-4">Share, Savor, Swap Recipes Together</p>
  <div class="d-flex justify-content-center">
    <form id="search-form" action="/search" method="GET">
      <div class="d-flex flex-column mb-2 gap-1">
        <label for="name">Recipe:</label>
        <input class="form-control" type="text" name='name' id='name' value=<?= $_GET['name'] ?? '' ?>>
      </div>

      <div class="d-flex flex-row justify-content-between gap-3">
        <div class="d-flex flex-column gap-1">
          <label for="time">Time:</label>
          <select class="form-select" name="time" id="time">
            <option value=999 selected>All</option>
            <option value=15 <?= isset($_GET['time']) && $_GET['time'] == 15 ? 'selected' : '' ?>>Under 15 mins</option>
            <option value=30 <?= isset($_GET['time']) && $_GET['time'] == 30 ? 'selected' : '' ?>>Under 30 mins</option>
            <option value=45 <?= isset($_GET['time']) && $_GET['time'] == 45 ? 'selected' : '' ?>>Under 45 mins</option>
            <option value=60 <?= isset($_GET['time']) && $_GET['time'] == 60 ? 'selected' : '' ?>>Under 1 hr</option>
            <option value=90 <?= isset($_GET['time']) && $_GET['time'] == 90 ? 'selected' : '' ?>>Under 1:30 hr</option>
            <option value=120 <?= isset($_GET['time']) && $_GET['time'] == 120 ? 'selected' : '' ?>>Under 2 hr</option>
          </select>
        </div>

        <div class="d-flex flex-column gap-1">
          <label for="difficulty">Difficulty:</label>
          <select class="form-select" name="difficulty" id="difficulty">
            <option value=0 selected>All</option>
            <option value=1 <?= isset($_GET['difficulty']) && $_GET['difficulty'] == 1 ? 'selected' : '' ?>>Easy</option>
            <option value=2 <?= isset($_GET['difficulty']) && $_GET['difficulty'] == 2 ? 'selected' : '' ?>>Medium</option>
            <option value=3 <?= isset($_GET['difficulty']) && $_GET['difficulty'] == 3 ? 'selected' : '' ?>>Hard</option>
          </select>
        </div>

        <div class="d-flex flex-column gap-1">
          <label for="servings">Servings:</label>
          <input class="form-control" type="number" name="servings" id="servings" value="<?= $_GET['servings'] ?? '' ?>">
        </div>

        <div class="d-flex flex-column gap-1">
          <label for="sort">Sort By:</label>
          <select class="form-select" name="sort" id="sort">
            <option value="created" selected>New</option>
            <option value="rating" <?= isset($_GET['sort']) && $_GET['sort'] == 'rating' ? 'selected' : '' ?>>Ratings</option>
            <option value="views" <?= isset($_GET['sort']) && $_GET['sort'] == 'views' ? 'selected' : '' ?>>Views</option>
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
<!-- search end -->