<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/include/php/config.php";

if (!isset($_SESSION['sess_user']))
{
    header('Location: home.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">

    <?php
    include('include/php/head.php');
    include('include/php/session.php');
    ?>
</head>

<body>
    <?php include('include/php/header.php'); ?>

    <div class="container py-3">
        <div class="row">
            <!-- Right sidebar -->
            <div class="col-sm-12 col-md-3 col-left me-5">
                <div class="dashboard-menu">
                    <ul class="dashboard-menu-list list-unstyled">
                        <li class="dashboard-menu-item ps-3 py-3 align-item-center border-top border-start border-end rounded-top">
                            <a href="profile.php?page=profile" class="text-decoration-none">
                                <i class="fa-solid fa-user text-body"></i>
                                <p id="icon" class="text-body">My Profile</p>
                            </a>
                        </li>
                        <li class="dashboard-menu-item ps-3 py-3 align-item-center border rounded-bottom">
                            <a href="profile.php?page=history" class="text-decoration-none">
                                <i class="fa-solid fa-clock-rotate-left text-body"></i>
                                <p id="icon" class="text-body">Practice Test History</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main -->
            <?php
            $page = $_GET['page'];

            // * Profile
            if ($page == 'profile' or empty($page)) :
            ?>
                <div class="col-sm-12 col-md-8 col-right h-auto">
                    <h1 class="h2">My Profile</h1>

                    <?php include('include/php/average-score.php'); ?>

                    <!-- User's info -->
                    <div class="row border rounded mt-3">
                        <div class="form-item col-xs-12 col-sm-6 my-3">
                            <label class="form-label fw-bold">Name:</label>
                            <input value="<?php echo $user_name; ?>" disabled="disabled" class="form-control" type="text">
                        </div>
                        <div class="form-item col-xs-12 col-sm-6 my-3">
                            <label class="form-label fw-bold">Account Level:</label>
                            <input value=  "<?php 
                                            if ($user_level == 1) {
                                                echo "Admin";
                                            }
                                            else {
                                                echo "User";
                                            }
                                            ?>" 
                                disabled="disabled" class="form-control" type="text">
                        </div>
                        <div class="form-item col-xs-12 col-sm-6 my-3">
                            <label class="form-label fw-bold">Username:</label>
                            <input value="<?php echo $user_check; ?>" disabled="disabled" class="form-control" type="text">
                        </div>
                        <div class="form-item col-xs-12 col-sm-6 my-3">
                            <label class="form-label fw-bold pass">Password:</label>
                            <button class="btn btn-dark fw-bold">Change password</button>
                        </div>
                    </div>
                </div>

            <?php
            // * History
            elseif ($page == 'history') :
                include('history.php');
            endif; 
            ?>
        </div>
    </div>

    <?php include('include/html/footer.html'); ?>
</body>

</html>