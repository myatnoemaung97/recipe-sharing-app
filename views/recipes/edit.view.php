<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit recipe</title>
    <?php require BASE_PATH . 'public/resources/links/links.php' ?>
</head>

<body>
    <header>
        <?php require base_path('views/partials/nav.view.php') ?>
    </header>
    <main>
        <div class="content">
            <h3 class="heading text-center mt-2 mb-2">Edit the recipe</h3>
            <form class="d-flex flex-row justify-content-center align-items-center" style="max-width: 1000px; margin: auto;" action="/recipe/update?id=<?= $recipe['id'] ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <div class="d-flex flex-row justify-content-between gap-4">
                    <div>
                        <label class="mt-2" for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value='<?= $_SESSION['_flash']['old']['name'] ?? $recipe['name'] ?? '' ?>'>
                        <?php if (isset($_SESSION['_flash']['errors']['name'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['name'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="description">Short Description</label>
                        <textarea class="form-control" name="description" id="description" style="width: 600px; height: 50px;"><?= $_SESSION['_flash']['old']['description'] ?? $recipe['description'] ?? ''  ?></textarea>
                        <?php if (isset($_SESSION['_flash']['errors']['description'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['description'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="name">Cooking Time (in minutes)</label>
                        <input class="form-control" type="number" name="time" id="time" value='<?= $_SESSION['_flash']['old']['time']  ?? $recipe['time'] ?? '' ?>'>
                        <?php if (isset($_SESSION['_flash']['errors']['time'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['time'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="difficulty">Difficulty</label>
                        <select name="difficulty" id="difficulty" class="form-select">
                            <option value="">Select</option>
                            <option value="easy" <?= ($recipe['difficulty'] === 1) || isset($_SESSION['_flash']['old']) && $_SESSION['_flash']['old']['difficulty'] === 'easy' ? 'selected' : '' ?>>Easy</option>
                            <option value="medium" <?= ($recipe['difficulty'] === 2) || isset($_SESSION['_flash']['old']) && $_SESSION['_flash']['old']['difficulty'] === 'medium' ? 'selected' : '' ?>>Medium</option>
                            <option value="hard" <?= ($recipe['difficulty'] === 3) || isset($_SESSION['_flash']['old']) && $_SESSION['_flash']['old']['difficulty'] === 'hard' ? 'selected' : '' ?>>Hard</option>
                        </select>
                        <?php if (isset($_SESSION['_flash']['errors']['difficulty'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['difficulty'] ?></p>
                        <?php endif; ?>

                        <label class="mt-2" for="servings">Servings</label>
                        <input class="form-control" type="number" name="servings" id="servings" value='<?= $_SESSION['_flash']['old']['servings'] ?? $recipe['servings'] ?? ''  ?>'>
                        <?php if (isset($_SESSION['_flash']['errors']['servings'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['servings'] ?></p>
                        <?php endif; ?>

                        <div class="mt-3" id="ingredient-container">
                            <label class="d-block" for="ingredients">Ingredients - quantity</label>
                            <?php if (isset($_SESSION['_flash']['old']['ingredients'])) : ?>
                                <?php foreach ($_SESSION['_flash']['old']['ingredients'] as $ingredient) : ?>
                                    <input type="text" name="ingredients[]" value="<?= $ingredient ?>" placeholder="eg. salt - 1 tablespoon">
                                <?php endforeach; ?>
                            <?php elseif (isset($recipe['ingredients'])) : ?>
                                <?php foreach (csvToArray($recipe['ingredients']) as $ingredient) : ?>
                                    <input type="text" name="ingredients[]" value="<?= $ingredient ?>" placeholder="eg. salt - 1 tablespoon">
                                <?php endforeach; ?>
                            <?php else : ?>
                                <input type="text" name="ingredients[]" placeholder="eg. salt - 1 tablespoon">
                            <?php endif; ?>
                        </div>
                        <button class="btn btn-success mt-2" type="button" onclick="addIngredient()">Add Ingredient</button><br>
                        <?php if (isset($_SESSION['_flash']['errors']['ingredients'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['ingredients'] ?></p>
                        <?php endif; ?>

                        <a id="change-photo-button" class="btn btn-success mt-3" onclick="changePhoto()">Change Photo</a>
                        <div id="change-photo-section" class="hide mt-3">
                            <label class="mt-2" for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                            <?php if (isset($_SESSION['_flash']['errors']['image'])) : ?>
                                <p class="warning"><?= $_SESSION['_flash']['errors']['image'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div>
                        <label class="d-block mt-2" for="instructions">Instructions</label>
                        <textarea class="form-control" name="instructions" id="instructions" style="width: 600px; height: 520px;"><?= $_SESSION['_flash']['old']['instructions'] ?? $recipe['instructions'] ?? '' ?></textarea>
                        <?php if (isset($_SESSION['_flash']['errors']['instructions'])) : ?>
                            <p class="warning"><?= $_SESSION['_flash']['errors']['instructions'] ?></p>
                        <?php endif; ?>

                        <button class="btn btn-success mt-2" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php require base_path("views/partials/footer.view.php") ?>
    </footer>

    <script>
        // JavaScript function to add new ingredient input fields
        function addIngredient() {
            var container = document.getElementById("ingredient-container");
            var input = document.createElement("input");
            input.type = "text";
            input.name = "ingredients[]";
            input.placeholder = "eg. salt-1 tablespoon";
            container.appendChild(input);
        }
    </script>
</body>