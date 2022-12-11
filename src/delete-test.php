<?php
    session_start();
    include('./include/php/session.php');
    if($user_level != 1) {
        header("Location: index.php?page=home");
    } 
    else {
        $getID = $_GET['id'];
        if(!empty($getID)) {
            $delete_sql = "DELETE FROM Test where ID='$getID'";
            mysqli_query($conn, $delete_sql);
            $delete_sql = "DELETE FROM Test_Cate where T_ID='$getID'";
            mysqli_query($conn, $delete_sql);
            $delete_sql = "DELETE FROM Question where T_ID='$getID'";
            mysqli_query($conn, $delete_sql);
            $delete_sql = "DELETE FROM User_Test where T_ID='$getID'";
            mysqli_query($conn, $delete_sql);
        }
        header("Location: index.php?page=library");
    }
?>