<?php
    session_start();

    $getPage = $_GET['page'];
    $getID = $_GET['id'];
    if($getPage == 'home' or empty($getPage)) {
        header("Location: home.php");
    }
    elseif($getPage == "create-test") {
        header("Location: create-test.php");
    }
    elseif($getPage == "categories") {
        header("Location: categories.php");
    }
    elseif($getPage == "create-category") {
        header("Location: create-category.php");
    }
    elseif($getPage == "edit-category") {
        header("Location: edit-category.php?id=$getID");
    }
    elseif($getPage == "delete-category") {
        header("Location: delete-category.php?id=$getID");
    }
    elseif($getPage == "login") {
        header("Location: login.php");
    }
    elseif($getPage == "register") {
        header("Location: register.php");
    }
    elseif($getPage == "logout") {
        header("Location: logout.php");
    }
    else {
        header("Location: home.php");
    }
?>