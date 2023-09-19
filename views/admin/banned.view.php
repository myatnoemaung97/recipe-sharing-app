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
  <script src="/resources/js/general.js"></script>
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
              <h1 class="m-0">Banned Users</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class='d-flex justify-content-between'>
            <h5>Total - <?= count($users) ?></h5>
            <form action="/home/admin/users" method="GET">
              <label for="">Sort by: </label>
              <select name="sort" id="">
                <option value="id">Id</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
                <option value="created">Created</option>
                <option value="updated">Updated</option>
              </select>
              <button type="submit" class="btn btn-primary btn-sm">Sort</button>
            </form>
          </div>

          <table class="table table-secondary table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td><?= $user['id'] ?></td>
                  <td><?= $user['name'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td><?= $user['created'] ?></td>
                  <td><?= $user['updated'] ?></td>
                  <td>
                    <form action="/bans" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="id" value="<?= $user['id'] ?>">
                      <button class="btn btn-danger">Remove</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
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
</body>

</html>