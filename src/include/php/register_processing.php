<?php
if(isset($_POST["register"])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

    if($pass1 == $pass2) {
        $check_pass = $_POST['pass1'];
        if(strongPassword($check_pass)) {
            $query = mysqli_query($conn, "SELECT * FROM User WHERE Username = '$user'"); 
            $numrows = mysqli_num_rows($query);
            if($numrows == 0) {
                $sql = "INSERT INTO User (Name, Username, Password, Level)
                    VALUES ('$name', '$user', '$pass1', 2)";
                mysqli_query($conn, $sql);
                header("Location: index.php?page=login");
            } else {
                $register_error = "This username already exists!";
            }
        }
        else {
            $register_error = "Weak password!";
        }
    } else {
        $register_error = "Please reconfirm your password!";
    }
}
?>