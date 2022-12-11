<?php
    session_start();

    $getPage = $_GET['page'];
    $getID = $_GET['id'];

    if(empty($getPage)) 
    {
        header("Location: home.php");
    }
    /*elseif($getPage == "edit-category") {
        header("Location: edit-category.php?id=$getID");
    }
    elseif($getPage == "delete-category") {
        header("Location: delete-category.php?id=$getID");
    }*/
    else
    {
        if(!empty($getID)) {
            header("Location: " . $getPage . ".php?id=$getID");
        }
        else {
            header("Location: " . $getPage . ".php");
        }
    }
?>