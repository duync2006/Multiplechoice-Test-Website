<?php
  session_start();
  include('./include/php/session.php');
  if(isset($_SESSION["sess_user"])) {
    header("Location: index.php?page=home");
  }
  else {
    include('./include/php/function.php');
    include('./include/php/register_processing.php');
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
    include('./include/php/register-body.php')
  ?>
  <footer> 
  <?php
    include('./include/html/footer.html');
  ?>
  </footer>
</body>

<script src="./js/header.js"></script>
</html>