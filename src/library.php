<?php
session_start();
include('include/php/session.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Library</title>
    <link rel="stylesheet" href="css/library.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <?php
    include('include/php/head.php');
    ?>
</head>

<body>
    <?php include('include/php/header.php'); ?>

    <?php
    if (isset($_GET['cateID']))
    {
        $isCate = TRUE;
        $cateID = $_GET['cateID'];
    }
    elseif (isset($_GET['levelID']))
    {
        $isLevel = TRUE;
        $levelID = $_GET['levelID'];
    }
    else
    {
        $isCate = FALSE;
        $isLevel = FALSE;
    }

    // * Get data
    if ($isCate)
    {
        $sql = "SELECT T_ID FROM Test_Cate
                WHERE C_ID = '$cateID'
                ORDER BY T_ID";
        $res = $conn->query($sql);

        if ($res->num_rows == 0)
        {
            echo "<div class='library-page'><p class='h3 text-primary text-center fw-bold py-3'>No tests available for this category. Please visit again later.</p></div>";

            include('include/html/footer.html');
            exit();
        }
        else
        {
            while ($row = $res->fetch_assoc())
            {
                $tid[] = $row['T_ID'];
            }
            $count = count($tid);

            for ($i = 0; $i < $count; $i++)
            {
                $sql = "SELECT T_Name, Level FROM Test
                        WHERE ID = $tid[$i]";
                $res = $conn->query($sql);

                while ($row = $res->fetch_assoc())
                {
                    $name[] = $row['T_Name'];
                    $level[] = $row['Level'];
                }
            }
        }
    }
    elseif ($isLevel)
    {
        $sql = "SELECT ID, T_Name, Level FROM Test
                WHERE Level = $levelID
                ORDER BY T_Name";
        $res = $conn->query($sql);

        if ($res->num_rows == 0)
        {
            echo "<div class='library-page'><p class='h3 text-primary text-center fw-bold py-3'>No tests available for this level. Please visit again later.</p></div>";

            include('include/html/footer.html');
            exit();
        }
        else
        {
            while ($row = $res->fetch_assoc())
            {
                $tid[] = $row['ID'];
                $name[] = $row['T_Name'];
                $level[] = $row['Level'];
            }
            $count = count($tid);
        }
    }
    else
    {
        $sql = "SELECT ID, T_Name, Level FROM Test
                ORDER BY T_Name";
        $res = $conn->query($sql);

        if ($res->num_rows == 0)
        {
            echo "<div class='library-page'><p class='h3 text-primary text-center fw-bold py-3'>No tests available. Please visit again later.</p></div>";

            include('include/html/footer.html');
            exit();
        }
        else
        {
            while ($row = $res->fetch_assoc())
            {
                $tid[] = $row['ID'];
                $name[] = $row['T_Name'];
                $level[] = $row['Level'];
            }
            $count = count($tid);
        }
    }

    // * Live search
    if (!$isCate and !$isLevel) :
    ?>

        <!-- Input -->
        <div class="container px-5 pt-3">
            <input id="liveSearch" type="text" class="form-control" placeholder="Test's name, category, level">
        </div>

        <!-- Script -->
        <script>
            $(document).ready(function() 
            {
                $("#liveSearch").on("keyup", function() 
                {
                    var value = $(this).val().toLowerCase();

                    $("#testTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    <?php endif; 

    include('include/php/library-body.php');

    include('include/html/footer.html'); 
    ?>
</body>


</html>