<?php
    session_start();

    $getPage = $_GET['page'];
    $getID = $_GET['id'];

    if ($getPage == 'home' or empty($getPage)) 
    {
        header("Location: home.php");
    }
    if($getPage == 'home' or empty($getPage)) {
        header("Location: home.php");
    }
    elseif($getPage == "edit-category") {
        header("Location: edit-category.php?id=$getID");
    }
    elseif($getPage == "delete-category") {
        header("Location: delete-category.php?id=$getID");
    }
    else
    {
        header("Location: " . $getPage . ".php");
    }
?>