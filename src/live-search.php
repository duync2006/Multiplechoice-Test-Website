<?php
    include "./include/php/config.php";
    
    if(isset($_POST["category-search"])) {
        $data = array();

        $keyword = $_POST["category-search"];
            
        $sql = "SELECT * FROM Category WHERE C_Name LIKE '%$keyword%' ORDER BY C_Name";
        $query = mysqli_query($conn, $sql);

        foreach($query as $row) {
            $data[] = array(
                'ID'            => $row['ID'],
                'C_Name'        => $row['C_Name']
            );
        }

        echo json_encode($data);
    }
?>