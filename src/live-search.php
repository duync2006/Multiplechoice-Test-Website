<?php
    include "./include/php/config.php";
    
    if(isset($_POST["category-search"])) {
        $data = array();

        $keyword = $_POST["category-search"];
            
        $sql = "SELECT * FROM Category WHERE Name LIKE '%$keyword%' ORDER BY Name";
        $query = mysqli_query($conn, $sql);

        foreach($query as $row) {
            $data[] = array(
                'ID'            => $row['ID'],
                'Name'          => $row['Name']
            );
        }

        echo json_encode($data);
    }
?>