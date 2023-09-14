<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/resources/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/resources/dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>
  <style>
    .warning {
      color: red;
    }
  </style>
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
          <div class="mb-2 d-flex flex-row justify-content-center  ">
            <div>
              <h1 class="m-0">Create admin</h1>
            </div><!-- /.col -->
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <form style="max-width: 600px; margin: auto; padding-top: 50px;" action="/admins" method="POST">
            <label class="mt-2">Name</label>
            <input class="form-control" type="text" name="name" value="<?= $_SESSION['_flash']['old']['name'] ?? '' ?>">
            <?php if (isset($_SESSION['_flash']['errors']['name'])) : ?>
              <p class="warning"><?= $_SESSION['_flash']['errors']['name'] ?></p>
            <?php endif; ?>
            <label class="mt-2">Email</label>
            <input class="form-control" type="text" name="email" value="<?= $_SESSION['_flash']['old']['email'] ?? '' ?>">
            <?php if (isset($_SESSION['_flash']['errors']['email'])) : ?>
              <p class="warning"><?= $_SESSION['_flash']['errors']['email'] ?></p>
            <?php endif; ?>
            <label class="mt-2">Password</label>
            <input class="form-control" type="password" name="password">
            <?php if (isset($_SESSION['_flash']['errors']['password'])) : ?>
              <p class="warning"><?= $_SESSION['_flash']['errors']['password'] ?></p>
            <?php endif; ?>
            <button class="btn btn-success mt-3">Add</button>
          </form>
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

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/resources/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/resources/dist/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>