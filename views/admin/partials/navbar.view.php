<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/home/admin" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item" title="My Profile">
            <a href="/profile?id=<?= $_SESSION['user']['id'] ?>" class="dropdown-item">
                <i class="far fa-user"></i>
            </a>
        </li>
        <li class="nav-item" title="logout">
            <a href="/logout" class="dropdown-item">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->