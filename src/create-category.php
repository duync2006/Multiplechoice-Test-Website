<?php
  session_start();
  include('./include/php/session.php');
  if($user_level != 1) {
    header("Location: index.php?page=home");
  }
  else {
    include('./include/php/create-category_processing.php');
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
    include('./include/php/create-category-body.php')
  ?>
  <?php
    include('./include/html/footer.html');
  ?>
</body>

<script src="./js/header.js"></script>
</html>