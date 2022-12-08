<?php
    session_start();

    $getPage = $_GET['page'];
    // $getID = $_GET['id'];

    if ($getPage == 'home' or empty($getPage)) 
    {
        header("Location: home.php");
    }
    else
    {
        header("Location: " . $getPage . ".php");
    }
    /*
    elseif ($getPage == "products") 
    {
        header("Location: products.php");
    }
    elseif ($getPage == "add-products") 
    {
        header("Location: add-products.php");
    }
    elseif ($getPage == "product-view") 
    {
        header("Location: product-view.php?id=$getID");
    }
    elseif ($getPage == "edit-products") 
    {
        header("Location: edit-products.php?id=$getID");
    }
    elseif ($getPage == "delete-products") 
    {
        header("Location: delete-products.php?id=$getID");
    }
    elseif ($getPage == "login") 
    {
        header("Location: login.php");
    }
    elseif ($getPage == "register") 
    {
        header("Location: register.php");
    }
    elseif ($getPage == "logout") 
    {
        header("Location: logout.php");
    }
    else {
        header("Location: home.php");
    } */
?>