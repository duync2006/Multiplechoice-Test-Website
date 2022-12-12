<?php

$servername = "localhost";
$username = "root";
$password = "root";
try{
    $conn = new PDO("mysql:host=$servername; dbname=Web_Ass", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>