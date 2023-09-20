<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Users</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/resources/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="/resources/dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" href="/resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="/resources/dist/css/adminlte.min.css?v=3.2.0">

  <script src="/resources/js/general.js"></script>

  <script nonce="4364594b-9c68-4a27-89f4-773ce80bebf7">
    (function(w, d) {
      ! function(a, b, c, d) {
        a[c] = a[c] || {};
        a[c].executed = [];
        a.zaraz = {
          deferred: [],
          listeners: []
        };
        a.zaraz.q = [];
        a.zaraz._f = function(e) {
          return async function() {
            var f = Array.prototype.slice.call(arguments);
            a.zaraz.q.push({
              m: e,
              a: f
            })
          }
        };
        for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
        a.zaraz.init = () => {
          var h = b.getElementsByTagName(d)[0],
            i = b.createElement(d),
            j = b.getElementsByTagName("title")[0];
          j && (a[c].t = b.getElementsByTagName("title")[0].text);
          a[c].x = Math.random();
          a[c].w = a.screen.width;
          a[c].h = a.screen.height;
          a[c].j = a.innerHeight;
          a[c].e = a.innerWidth;
          a[c].l = a.location.href;
          a[c].r = b.referrer;
          a[c].k = a.screen.colorDepth;
          a[c].n = b.characterSet;
          a[c].o = (new Date).getTimezoneOffset();
          if (a.dataLayer)
            for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                ...o[1],
                ...p[1]
              })), {}))) zaraz.set(n[0], n[1], {
              scope: "page"
            });
          a[c].q = [];
          for (; a.zaraz.q.length;) {
            const q = a.zaraz.q.shift();
            a[c].q.push(q)
          }
          i.defer = !0;
          for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith("_zaraz_"))).forEach((s => {
            try {
              a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
            } catch {
              a[c]["z_" + s.slice(7)] = r.getItem(s)
            }
          }));
          i.referrerPolicy = "origin";
          i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
          h.parentNode.insertBefore(i, h)
        };
        ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
</head>

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
              <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
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
                          <td><button class="btn btn-danger" onclick="confirmDeleteProfile(<?= $user['id'] ?>, true)">Delete</button></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="/resources/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/resources/dist/js/adminlte.min.js"></script>
        <script src="/resources/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/resources/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/resources/plugins/jszip/jszip.min.js"></script>
        <script src="/resources/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="/resources/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="/resources/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/resources/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="/resources/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script src="/resources/dist/js/adminlte.min.js?v=3.2.0"></script>

        <script>
          $(function() {
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
</body>

</html>