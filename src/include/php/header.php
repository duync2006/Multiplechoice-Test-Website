<div id="header">
    <nav id="nav" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDarkDropdown">
                <ul class="navbar-nav left-side">
                    <li class="nav-item">
                        <a class="home-icon nav-link" href="index.php?page=home"><i class="fa-solid fa-house"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="subnav nav-link" href="../../library.php" aria-expanded="false">
                            Test Library<i class="subnav-toggler fa-solid fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="subnav-item dropdown-item" href="#">Highly rated tests</a></li>
                            <li><a class="subnav-item dropdown-item" href="#">Popular tests</a></li>
                            <li><a class="subnav-item dropdown-item" href="#">Difficult tests</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Instructors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav right-side">
                    <?php
                    if(isset($_SESSION["sess_user"])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=profile"><i class="fa-solid fa-user me-2"></i><?= $user_name; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=logout">Logout</a>
                        </li> 
                        <?php
                    }
                    else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=register">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=login">Sign in</a>
                        </li> 
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

