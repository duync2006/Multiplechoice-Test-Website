<?php
    session_start();
    include('./include/php/session.php');
    if($user_level != 1) {
        header("Location: index.php?page=home");
    } 
    else {
        $getID = $_GET['id'];
        if(!empty($getID)) {
            $delete_sql = "DELETE FROM Test_Cate where C_ID='$getID'";
            mysqli_query($conn, $delete_sql);
            $delete_sql = "DELETE FROM Category where ID='$getID'";
            mysqli_query($conn, $delete_sql);
        }
        header("Location: index.php?page=categories");
    }
?>