<!DOCTYPE html>
<html>

<head>
    <title>Average Score</title>
</head>

<body>
    <?php
    include('session.php');

    $sql = "SELECT AVG(Score)
            FROM User_Test
            WHERE U_ID = '$user_id'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);

    if ($num == 1)
    {
        $row = mysqli_fetch_array($res);
        $avg_score = $row['AVG(Score)'];
    }
    else
    {
        $avg_score = 0;
    }
    ?>

    <!-- Average Score -->
    <div class="border rounded mx-5 w-50 mx-auto">
        <div class="text-center mt-3">
            <i class="fa-solid fa-star fa-lg text-body mx-auto"></i>
        </div>
        <p class="fw-bold text-center text-muted mt-2 mb-0">Average Score</p>
        <p class="display-6 fw-bolder text-center">
            <?php echo number_format($avg_score, 2, '.', ','); ?>
        </p>
    </div>
</body>

</html>