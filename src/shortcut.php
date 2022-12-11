<?php

$servername = "localhost";
$username = "root";
$password = "root";
try{
    $conn = new PDO("mysql:host=$servername; dbname=Web_Ass", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<?php
$sql = $conn->prepare("SELECT * from question ORDER BY RAND()");
$sql->execute();

$index = 1;
$data2 = '<div class="card">
                <div class="card-header bg-info">
                    <h3>Test Name</h3>
                </div>';
$data2.=        '<div class="row">';
while($result = $sql->fetch(PDO::FETCH_ASSOC))
{
    // SHORCUT
    $data2.=            '<div class="col-1 m-3">';
    $data2.=           ' <button type="button" class="btn btn-outline-dark">'.$index.'</button>';
    $data2.=            '</div>';
    $index++;
}
$data2 .= '</div>';
$data2.=        '</div>';
echo $data2;
?>

