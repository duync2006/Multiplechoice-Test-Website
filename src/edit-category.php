<?php
  session_start();
  include('./include/php/session.php');
  if($user_level != 1) {
    header("Location: index.php?page=home");
  }
  else {
    if(isset($_GET["id"])) {
        include('./include/php/function.php');
        $category_id = $_GET["id"];
        $get_category_query = getByID('Category', $category_id);
        if(mysqli_num_rows($get_category_query) > 0) {
            include('./include/php/create-category_processing.php');
        }
        else {
            die("Category does not exist!");
        }
    }
    else {
        die("Missing id from url!");
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <?php
    include('./include/php/head.php');
  ?>
</head>

<body>
  <?php
    include('./include/php/header.php');
  ?>
  <?php
    $get_category_query = getByID('Category', $category_id);
    $category_item = mysqli_fetch_array($get_category_query);
    include('./include/php/edit-category-body.php')
  ?>
  <?php
    include('./include/html/footer.html');
  ?>
</body>

<script src="./js/header.js"></script>
</html>