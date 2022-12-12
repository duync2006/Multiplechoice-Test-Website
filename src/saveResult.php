<?php
   include $_SERVER['DOCUMENT_ROOT']."/include/php/config.php";
   session_start();
   $score = isset($_POST['score']);
   $test_id = $_SESSION["testID"];
   if(!isset($_SESSION['sess_user'])) {
       $login_session = 'Guest';
       $user_level = 2;
       $logged_in = false;
       header("Location: login.php");
   }
   else {
       $user_check = $_SESSION['sess_user'];

       $ses_sql = mysqli_query($conn, "SELECT ID, Username, Name, Level FROM User WHERE Username = '$user_check'");
       $row = mysqli_fetch_assoc($ses_sql);

       $login_session = $row['Username'];
       $user_id = $row['ID'];
       $user_name = $row['Name'];
       $user_level = $row['Level'];
       $logged_in = true;
       mysqli_query($conn, "UPDATE user_test SET Score =".$score."
                       WHERE U_ID = ".$user_id."
                       AND T_ID = ".$test_id." ");
   }
?>