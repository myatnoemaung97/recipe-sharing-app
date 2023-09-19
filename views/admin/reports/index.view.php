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
          <!-- pending reports -->
          <h5>Pending Reports</h5>
          <table class="table table-danger table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Content ID</th>
                <th scope="col">Content Type</th>
                <th scope="col">Author ID</th>
                <th scope="col">Report Type</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pending as $report) : ?>
                <tr>
                  <td><?= $report['id'] ?></td>
                  <td><?= $report['user_id'] ?></td>
                  <td><?= $report['content_id'] ?></td>
                  <td><?= $report['content_type'] ?></td>
                  <td><?= $report['author_id'] ?></td>
                  <td><?= $report['report_type'] ?></td>
                  <td><?= $report['description'] ?></td>
                  <td><?= $report['date'] ?></td>
                  <td><?= $report['status'] ?></td>
                  <td>
                    <a class="btn btn-danger" href="/home/admin/report?id=<?= $report['id'] ?>">Review</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- /pending reports -->

          <!-- in review -->
          <h5>In Reviews</h5>
          <table class="table table-warning table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Content ID</th>
                <th scope="col">Content Type</th>
                <th scope="col">Author ID</th>
                <th scope="col">Report Type</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($inReview as $report) : ?>
                <tr>
                  <td><?= $report['id'] ?></td>
                  <td><?= $report['user_id'] ?></td>
                  <td><?= $report['content_id'] ?></td>
                  <td><?= $report['content_type'] ?></td>
                  <td><?= $report['author_id'] ?></td>
                  <td><?= $report['report_type'] ?></td>
                  <td><?= $report['description'] ?></td>
                  <td><?= $report['date'] ?></td>
                  <td><?= $report['status'] ?></td>
                  <td>
                    <a class="btn btn-danger" href="/home/admin/report?id=<?= $report['id'] ?>">Review</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- /in review -->

          <!-- resolved -->
          <h5>Resolved</h5>
          <table class="table table-secondary table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Content ID</th>
                <th scope="col">Content Type</th>
                <th scope="col">Author ID</th>
                <th scope="col">Report Type</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action Taken</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($resolved as $report) : ?>
                <tr>
                  <td><?= $report['id'] ?></td>
                  <td><?= $report['user_id'] ?></td>
                  <td><?= $report['content_id'] ?></td>
                  <td><?= $report['content_type'] ?></td>
                  <td><?= $report['author_id'] ?></td>
                  <td><?= $report['report_type'] ?></td>
                  <td><?= $report['description'] ?></td>
                  <td><?= $report['date'] ?></td>
                  <td><?= $report['status'] ?></td>
                  <td><?= $report['action_taken'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- /resolved -->
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