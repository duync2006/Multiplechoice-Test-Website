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
    include('./include/php/categories-body.php')
  ?>
  <?php
    include('./include/html/footer.html');
  ?>
</body>

<script src="./js/header.js"></script>
<script>
    load_categories();

    function load_categories(query = '') {
        var form_data = new FormData();
        form_data.append('category-search', query);

        var ajax_request = new XMLHttpRequest();
        ajax_request.open("POST", "live-search.php");
        ajax_request.send(form_data);

        ajax_request.onreadystatechange = function() {
            if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = JSON.parse(ajax_request.responseText);

                var html = '';

                for(var count = 0; count < response.length; count++) {
                    html += '<div class="card shadow-sm p-3 mx-auto mb-4 bg-body rounded" style="width: 60vw">';

                    html += '<div class="card-body row">';

                    html += '<div class="col-6 display-name">';

                    html += response[count].C_Name;

                    html += '</div>'

                    html += '<div class="col-6 display-option">';

                    html += '<a href="index.php?page=edit-category&id=' + response[count].ID + '"><i class="fa-solid fa-gear"></i></a>';

                    html += '<a href="index.php?page=delete-category&id=' + response[count].ID + '"><i class="fa-solid fa-xmark"></i></a>';

                    html += '</div>'

                    html += '</div>';

                    html += '</div>';
                }

                if(count == 0) {
                    html = '<b>No records found.</b>';
                }

                document.getElementById('categories-list').innerHTML = html;
            }
        }
    }
</script>
</html>