<?php
  session_start();
  include('./include/php/session.php');
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
    include('./include/html/body.html')
  ?>
  <footer> 
  <?php
    include('./include/html/footer.html');
  ?>
  </footer>
</body>

<script src="./js/header.js"></script>
</html>