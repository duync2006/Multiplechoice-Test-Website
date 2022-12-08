<?php

    include $_SERVER['DOCUMENT_ROOT']."/include/php/config.php";

    if(!isset($_SESSION['sess_user'])) {
        $login_session = 'Guest';
        $user_level = 2;
        $logged_in = false;
    } else {
        $user_check = $_SESSION['sess_user'];
    
        $ses_sql = mysqli_query($conn, "SELECT Username, Name, Level FROM User WHERE Username = '$user_check'");
        $row = mysqli_fetch_assoc($ses_sql);
    
        $login_session = $row['Username'];
        $user_name = $row['Name'];
        $user_level = $row['Level'];   
        $logged_in = true;
    }

?>