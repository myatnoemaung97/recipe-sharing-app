<nav class="navbar navbar-expand-lg text-white fixed-top">
    <?php if (isset($_SESSION['user'])) : ?>
        <div class="container-fluid">
            <?php $brandLink = isset($_SESSION['user']) ? '/home' : '/' ?>
            <a class="heading navbar-brand text-white fs-4" href="<?= $brandLink ?>">Yum Share</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/home"><span class="gray-hover">Home</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="gray-hover">Recipes</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/recipes?id=<?= $_SESSION['user']['id'] ?>">My Recipes</a></li>
                            <li><a class="dropdown-item" href="/recipes/create">Create New Recipe</a></li>
                            <li><a class="dropdown-item" href="/recipes/favourites">Favourites</a></li>
                            <li><a class="dropdown-item" href="/search">Browse Recipes</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="nav-item btn-group dropdown me-3 mb-3 mb-lg-0">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">My Profile</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Quick Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>

    <?php else : ?>
        <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
            <?php $brandLink = isset($_SESSION['user']) ? '/home' : '/' ?>
            <a class="heading navbar-brand text-white fs-4" href="<?= $brandLink ?>">Yum Share</a>
            <div class="search-bar d-flex flex-row justify-content-between align-items-center gap-3">
                <a class="no-underline text-white" href=""><span class="gray-hover">Browse Recipes</span></a>
                <a class="no-underline text-white gray-hover ms-2" href="/login"><span class="gray-hover">Login</span></a>
                <a class="no-underline text-white gray-hover" href="/register"><span class="gray-hover">Register</span></a>
            </div>
        </div>
    <?php endif; ?>
</nav>