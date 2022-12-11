<!DOCTYPE html>
<html>
    <head>
        <title>Add Database</title>
    </head>
</html>

<?php
$hostname = "localhost";
$username = "root";
$password = "root";

$newConn = new mysqli($hostname, $username, $password);

// Check connection
if ($newConn->connect_error)
{
    die("Connection failed: " . $newConn->connect_error);
}

// * Create database
$sql = "CREATE DATABASE Web_Ass";

if ($newConn->query($sql))
{
    echo "Database created successfully" . "<br><br>";
}
// if (!$newConn->query($sql))
else
{
    echo "ERROR: " . $newConn->error . "<br><br>";
    die();
}

$newConn->close();

// * Connect database
include('config.php');

// * Create User table
$sql = "CREATE TABLE User (
        ID          int(11)        UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        Name        varchar(255)   NOT NULL,
        Username    varchar(255)   NOT NULL UNIQUE,
        Password    varchar(255)   NOT NULL,
        Level       int(1)         NOT NULL DEFAULT 2
        )";

if ($conn->query($sql))
{
    echo "User table created successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Insert admin account
$sql = "INSERT INTO User (Name, Username, Password, Level)
        VALUES ('admin', 'admin', 'Admin123', 1)";

if ($conn->query($sql))
{
    echo "Add admin successfully" . "<br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br>";
    die();
}

// * Insert sample user account
$sql = "INSERT INTO User (Name, Username, Password, Level)
        VALUES ('Nhat Minh', 'lenhatminh', 'Minh17', 2)";

if ($conn->query($sql))
{
    echo "Add sample user successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Create Category table
$sql = "CREATE TABLE Category
        (
            ID   int(11)      UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
            C_Name varchar(255) NOT NULL UNIQUE
        )";

if ($conn->query($sql))
{
    echo "Category table created successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Include data
include('include/php/data.php');

// * Insert into Category
for ($i = 0; $i < sizeof($cate); $i++)
{
    $id = $cate[$i][0];
    $name = $cate[$i][1];
    
    $sql = "INSERT INTO Category VALUES ($id, '$name')";

    if ($conn->query($sql))
    {
        echo "Add category successfully" . "<br>";
    }
    // if (!$conn->query($sql))
    else
    {
        echo "ERROR: " . $conn->error . "<br>";
        die();
    }
}
echo "<br>";

// * Create Test table
$sql = "CREATE TABLE Test
        (
            ID       int(11)      UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
            T_Name   varchar(255) NOT NULL,
            Level    int(1)       NOT NULL, -- 1 -> 6   (Beginner, Elementary, Intermediate, Upper Intermediate, Advanced, Proficient)
            Num_Ques int(3)       NOT NULL DEFAULT 0
        )";

if ($conn->query($sql))
{
    echo "Test table created successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Insert into Test
for ($i = 0; $i < sizeof($test); $i++)
{
    $id = $test[$i][0];
    $name = $test[$i][1];
    $level = $test[$i][2];
    
    $sql = "INSERT INTO Test (ID, T_Name, Level)
            VALUES ($id, '$name', $level)";

    if ($conn->query($sql))
    {
        echo "Add test successfully" . "<br>";
    }
    // if (!$conn->query($sql))
    else
    {
        echo "ERROR: " . $conn->error . "<br>";
        die();
    }
}
echo "<br>";

// * Create Test_Cate
$sql = "CREATE TABLE Test_Cate
        (
            C_ID    int(11) UNSIGNED NOT NULL,
            T_ID    int(11) UNSIGNED NOT NULL,
            PRIMARY KEY (C_ID, T_ID),
            FOREIGN KEY (C_ID) REFERENCES Category(ID),     -- Test_Cate -> Category
            FOREIGN KEY (T_ID) REFERENCES Test(ID)          -- Test_Cate -> Test
        )";

if ($conn->query($sql))
{
    echo "Test_Cate table created successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Insert into Test_Cate
for ($i = 0; $i < sizeof($test_cate); $i++)
{
    $cid = $test_cate[$i][0];
    $tid = $test_cate[$i][1];
    
    $sql = "INSERT INTO Test_Cate
            VALUES ($cid, $tid)";

    if ($conn->query($sql))
    {
        echo "Add test_cate successfully" . "<br>";
    }
    // if (!$conn->query($sql))
    else
    {
        echo "ERROR: " . $conn->error . "<br>";
        die();
    }
}
echo "<br>";

// * Create Question table
$sql = "CREATE TABLE Question
        (
            ID          int(11)      UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
            T_ID        int(11)      UNSIGNED NOT NULL,
            Content     varchar(255) NOT NULL UNIQUE,
            Option_A    varchar(255) NOT NULL,
            Option_B    varchar(255) NOT NULL,
            Option_C    varchar(255),
            Option_D    varchar(255),
            Answer      varchar(1)   NOT NULL,
            FOREIGN KEY (T_ID) REFERENCES Test(ID)
        )";

if ($conn->query($sql))
{
    echo "Question table created successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Insert into Question
for ($i = 0; $i < sizeof($ques); $i++)
{
    $tid = $ques[$i][0];
    $content = $ques[$i][1];
    $ans = $ques[$i][2];
    $a = $ques[$i][3];
    $b = $ques[$i][4];
    $c = $ques[$i][5];
    $d = $ques[$i][6];
    
    $sql = "INSERT INTO Question (T_ID, Content, Option_A, Option_B, Option_C, Option_D, Answer)
            VALUES ($tid, '$content', '$a', '$b', '$c', '$d', '$ans')";

    if ($conn->query($sql))
    {
        echo "Add question successfully --- ";

        // * Increase num_ques in Test
        $sql = "UPDATE Test SET Num_Ques = Num_Ques + 1
                WHERE ID = $tid";
        
        if ($conn->query($sql))
        {
            echo "Update num_ques successfully" . "<br>";
        }
        else
        {
            echo "ERROR: " . $conn->error . "<br>";
            die();
        }
    }
    // if (!$conn->query($sql))
    else
    {
        echo "ERROR: " . $conn->error . "<br>";
        die();
    }
}
echo "<br>";

// * Create User_Test table
$sql = "CREATE TABLE User_Test
        (
            U_ID    int(11)         UNSIGNED NOT NULL,
            T_ID    int(11)         UNSIGNED NOT NULL,
            Score   double(4,2)     UNSIGNED NOT NULL,
            Date    datetime        NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (U_ID) REFERENCES User(ID),
            FOREIGN KEY (T_ID) REFERENCES Test(ID)
        )";

if ($conn->query($sql))
{
    echo "User_Test table created successfully" . "<br><br>";
}
// if (!$conn->query($sql))
else
{
    echo "ERROR: " . $conn->error . "<br><br>";
    die();
}

// * Insert sample history
for ($i = 0; $i < sizeof($his); $i++)
{
    $uid = $his[$i][0];
    $tid = $his[$i][1];
    $score = $his[$i][2];
    $date = $his[$i][3];
    
    $sql = "INSERT INTO User_Test
            VALUES ($uid, $tid, $score, '$date')";

    if ($conn->query($sql))
    {
        echo "Add sample history successfully" . "<br>";
    }
    // if (!$conn->query($sql))
    else
    {
        echo "ERROR: " . $conn->error . "<br>";
        die();
    }
}

?>