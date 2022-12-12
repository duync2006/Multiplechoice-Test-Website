<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/include/php/session.php";
    $score = $_POST['score'];
    $test_id = $_SESSION["testID"];
    $query = mysqli_query($conn, "SELECT Num_Ques FROM Test WHERE ID='$test_id'");
    $row = mysqli_fetch_assoc($query);
    $num_ques = $row["Num_Ques"];
    
    $score = $score / $num_ques * 10;

    $query = mysqli_query($conn, "SELECT * FROM User_Test WHERE T_ID='$test_id' AND U_ID='$user_id'");

    $existed = mysqli_num_rows($query);

    if($existed == 0) {
        mysqli_query($conn, "INSERT INTO User_Test (Score, U_ID, T_ID) VALUES ($score, $user_id, $test_id)");
    }
    else {
        mysqli_query($conn, "UPDATE user_test SET Score = '$score'
                            WHERE U_ID = '$user_id'
                            AND T_ID = '$test_id'");
    }
?>