<!DOCTYPE html>
<html>

<head>
    <title>Test History</title>
</head>

<body>
    <div class="col-sm-12 col-md-8 col-right h-auto">
        <h1 class="h2">Your Test History</h1>

        <!-- Test history -->
        <div class="border rounded mt-3 p-3 text-center">

            <?php
            include('average-score.php');

            $sql = "SELECT T_ID, Score, Date
                    FROM User_Test
                    WHERE U_ID = '$user_id'
                    ORDER BY Date";
            $res = $conn->query($sql);

            // * No result
            if ($res->num_rows == 0):
            ?>
                <p class="h3 text-primary fw-bold pt-3">You haven't taken any test yet</p>
                <p class="text-muted">How about give it a try?</p>
                <a href="#" class="btn btn-dark p-3">Take a free test</a>
            <?php
            else:

            // * Get results
            while ($row = $res->fetch_assoc())
            {
                $test_id[] = $row['T_ID'];
                $score[] = $row['Score'];
                $date[] = $row['Date'];
            }
            $count = count($test_id);

            for ($i = 0; $i < $count; $i++)
            {
                $sql = "SELECT T_Name
                        FROM Test
                        WHERE ID = '$test_id[$i]'";
                $res = $conn->query($sql);

                while ($row = $res->fetch_assoc())
                {
                    $test[] = $row['T_Name'];
                }
            }
            ?>

            <!-- Test History -->
            <table class="table test-history mt-3">
                <thead>
                    <tr>
                        <th scope="col">Test name</th>
                        <th scope="col">Score</th>
                        <th scope="col">Date - Time</th>
                    </tr>
                </thead>

                <tbody>
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                        <tr>
                            <td>
                                <?php echo $test[$i]; ?>
                            </td>
                            <td>
                                <?php echo $score[$i]; ?>
                            </td>
                            <td>
                                <?php echo $date[$i]; ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <?php endif; ?>
        </div>
    </div>
</body>

</html>