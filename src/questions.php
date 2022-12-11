<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    try{
        $conn = new PDO("mysql:host=$servername; dbname=Web_Ass", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

<?php
    session_start();

    $test_id = $_SESSION["testID"];
    $sql = $conn->prepare("SELECT * from question WHERE question.T_ID =".$test_id."  ORDER BY RAND() ");
    $sql->execute();

    echo json_encode($sql->fetchAll());
?>