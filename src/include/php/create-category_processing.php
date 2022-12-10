<?php

if(isset($_POST['create-category'])) {
    $name = $_POST['category-name'];

    $query = mysqli_query($conn, "SELECT * FROM Category WHERE Name = '$name'");
    $numrows = mysqli_num_rows($query);

    if($numrows == 0) {
        $sql = "INSERT INTO Category (Name) VALUES ('$name')";
        if(mysqli_query($conn, $sql)) {
            $create_category_msg = "Category is created!";
            $create_success = 1;
        }
        else {
            $create_category_msg = "Something went wrong!";
            $create_success = 0;
        }
    }
    else {
        $create_category_msg = "This category already exists!";
        $create_success = 0;
    }
}
elseif(isset($_POST['edit-category'])) {
    $id = $_POST['category-id'];
    $name = $_POST['category-name'];

    $sql = "UPDATE Category SET Name='$name' WHERE ID='$id'";
    if(mysqli_query($conn, $sql)) {
        $edit_category_msg = "Category is updated!";
        $edit_success = 1;
    }
    else {
        $edit_category_msg = "Failed to update category!";
        $edit_success = 0;
    }
}

?>