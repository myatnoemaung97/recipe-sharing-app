<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Reports</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/resources/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/resources/dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>
  <script src="/resources/js/recipe.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/resources/css/general.css">
  <link rel="stylesheet" href="/resources/css/recipe.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php require base_path('views/admin/partials/navbar.view.php') ?>
    <?php require base_path('views/admin/partials/sidebar.view.php') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Reports</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?php if ($recipe) : ?>
            <div class="recipe-image d-flex flex-column align-items-center position-relative">
              <!-- photo -->
              <img id="recipe-image" class="" src="<?= $recipe['image'] ?>" alt="recipe" style="max-width: 100%; max-height: 500px;">
              <!-- /photo -->

              <ul class="text-dark nav nav-underline nav-fill" style="width: 100%;">
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
                <?php if ($report['content_type'] === 'recipe') : ?>
                  <div class="d-flex flex-row justify-content-center gap-2">
                    <form action="" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger">Ban User</button>
                    </form>
                    <form action="" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-warning">Delete Recipe</button>
                    </form>
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
            <!-- /info section -->

            <!--comments start -->
            <div class="comments hide" id="comments-section">
              <div class="d-flex flex-row justify-content-between">
                <p class="fw-semibold"><span id="comment-count"><?= count($comments) ?></span> Comments</p>
              </div>
              <hr class="mb-3" style="margin-top: -5px;">
              <div>
                <div id="comments">
                  <?php foreach ($comments as $key => $comment) : ?>
                    <div class="d-flex flex-row justify-content-between">
                      <div class="lh-1">
                        <p class="fw-bold text-success" style="font-size: 18px;"><?= $comment['user_name'] ?></p>
                        <p style="margin-top: -10px; font-size: 12px; color: rgba(0, 0, 0, 0.7);"><?= $comment['created'] ?></p>
                        <p style="font-size: 14px;"><?= $comment['comment'] ?></p>
                      </div>
                      <?php if ($report['content_type'] === 'comment' && $report['content_id'] === $comment['id']) : ?>
                        <div class="d-flex flex-row justify-content-between align-items-center gap-2">
                          <i class="fa-solid fa-flag fa-lg text-red"></i>
                          <form action="" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">Ban User</button>
                          </form>
                          <form action="" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-warning">Delete Comment</button>
                          </form>
                        </div>
                      <?php endif; ?>
                    </div>
                    <hr>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <!-- comments end -->
          <?php endif; ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/resources/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/resources/dist/js/adminlte.min.js"></script>
</body>

</html>