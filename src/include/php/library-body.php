<!-- * Display library -->
<div class="container pb-3 library-page">
    <table class="table table-hover align-middle caption-top mt-3">
        <caption>List of tests</caption>

        <thead class="table-dark">
            <tr>
                <th class="p-3" scope="col">Test name</th>
                <th class="p-3" scope="col">Categories</th>
                <th class="p-3" scope="col">Difficulty</th>

                <?php
                    if($user_level == 1) {
                        ?>
                        <th class="p-3" scope="col">Delete</th>
                        <?php
                    }
                ?>
                <!-- <th class="text-end p-3" scope="col">Start test</th> -->
            </tr>
        </thead>

        <tbody id="testTable">
            <?php for ($i = 0; $i < $count; $i++) : ?>
                <tr class="my-5">
                    <td class="tname fw-bold p-3">
                        <!-- <a href="#" class="text-body"><?php echo $name[$i]; ?></a> -->
                        <?php echo "<a href='../../doTestPage.php?id=" . $tid[$i] . "' class='text-body'>" . $name[$i] . "</a>" ?>
                    </td>

                    <td class="text-muted p-3">
                        <?php
                        $sql = "SELECT C_ID FROM Test_Cate
                                WHERE T_ID = $tid[$i]";
                        $res = $conn->query($sql);

                        if ($res->num_rows != 0)
                        {
                            $cid = NULL;
                            while ($row = $res->fetch_assoc())
                            {
                                $cid[] = $row['C_ID'];
                            }

                            if ($res->num_rows <= 5)
                            {
                                $count_cid = count($cid);
                            }
                            else
                            {
                                $count_cid = 5;
                                $flag = TRUE;
                            }

                            $cate = NULL;
                            for ($j = 0; $j < $count_cid; $j++)
                            {
                                $sql = "SELECT C_Name FROM Category
                                        WHERE ID = $cid[$j]";
                                $res = $conn->query($sql);

                                while ($row = $res->fetch_assoc())
                                {
                                    $cate[] = $row['C_Name'];
                                }
                                $count_cate = count($cate);
                            }
                        }
                        else
                        {
                            $count_cate = 0;
                        }

                        for ($j = 0; $j < $count_cate; $j++)
                        {
                            echo $cate[$j];

                            if ($j != $count_cate - 1)
                                echo ", ";
                        }

                        if ($flag)
                        {
                            echo ", etc.";
                            $flag = FALSE;
                        }
                        ?>
                    </td>

                    <td class="p-3">
                        <?php
                        if ($level[$i] == 1)
                            echo "Beginner";
                        elseif ($level[$i] == 2)
                            echo "Elementary";
                        elseif ($level[$i] == 3)
                            echo "Intermediate";
                        elseif ($level[$i] == 4)
                            echo "Upper Intermediate";
                        elseif ($level[$i] == 5)
                            echo "Advanced";
                        else
                            echo "Proficient";
                        ?>
                    </td>

                    <?php
                        if($user_level == 1) {
                            ?>
                            <td class="p-3">
                            <a class="text-dark ms-4" href="index.php?page=delete-test&id=<?= $tid[$i]; ?>"><i class="fa-solid fa-xmark"></i></a>
                            </td>
                            <?php
                        }
                    ?>

                    <!-- Start test button -->
                    <!-- <td class="text-end"> -->
                        <!-- Use $tid[$i] -->
                        <!-- <a href="#" class="btn btn-primary px-5 py-3"></a> -->
                    <!-- </td> -->
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>