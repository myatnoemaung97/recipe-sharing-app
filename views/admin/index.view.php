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
                            <h1 class="m-0">Summary</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6 px-3">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Users stats</h5>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <p>All time - <?= $users['allTime'] ?></p>
                                        <p>Current - <?= $users['current'] ?></p>
                                        <p>This week - <?= $users['thisWeek'] ?></p>
                                    </div>
                                    <a class="btn btn-primary" href="/home/admin/users">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 px-3">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Recipes stats</h5>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <p>All time - <?= $recipes['allTime'] ?></p>
                                        <p>Current - <?= $recipes['current'] ?></p>
                                        <p>This week - <?= $recipes['thisWeek'] ?> </p>
                                    </div>
                                    <a class="btn btn-primary" href="/home/admin/recipes">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
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