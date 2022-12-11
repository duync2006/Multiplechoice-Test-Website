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
                            <li><a class="subnav-item dropdown-item" href="../../library.php?levelID=1">Beginner</a></li>
                            <li><a class="subnav-item dropdown-item" href="../../library.php?levelID=2">Elementary</a></li>
                            <li><a class="subnav-item dropdown-item" href="../../library.php?levelID=3">Intermediate</a></li>
                            <li><a class="subnav-item dropdown-item" href="../../library.php?levelID=4">Upper Intermediate</a></li>
                            <li><a class="subnav-item dropdown-item" href="../../library.php?levelID=5">Advanced</a></li>
                            <li><a class="subnav-item dropdown-item" href="../../library.php?levelID=6">Proficient</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="subnav nav-link" href="index.php?page=categories" aria-expanded="false">
                            Categories<i class="subnav-toggler fa-solid fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <?php
                                $sql = "SELECT * FROM Category LIMIT 5";
                                $categories = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($categories) > 0) {
                                    foreach($categories as $category) {
                                        ?>
                                        <li><a class="subnav-item dropdown-item" href="../../library.php?cateID=<?= $category["ID"]; ?>"><?= $category["C_Name"]; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><a class="subnav-item dropdown-item" href="index.php?page=categories">See more</a></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </li>
                    <?php
                    if($user_level != 1) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Instructors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Contact</a>
                        </li>
                        <?php
                    }
                    else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=create-test">Create Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=create-category">Create Category</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <ul class="navbar-nav right-side">
                    <?php
                    if($logged_in == true) {
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

