<?php
    if(isset($_POST["create-test"])) {
        $test_name = $_POST["test-name"];
        $test_categories = $_POST["category"];
        $test_difficulty = $_POST["test-difficulty"];

        $question_name = $_POST["question-name"];
        $option_a = $_POST["option-a"];
        $option_b = $_POST["option-b"];
        $option_c = $_POST["option-c"];
        $option_d = $_POST["option-d"];
        $question_answer = $_POST["answer"];

        $num_of_questions = count($question_name);

        $sql = "INSERT INTO Test (T_Name, Level, Num_Ques)
                VALUES ('$test_name', $test_difficulty, $num_of_questions)";

        if(mysqli_query($conn, $sql)) {
            $test_id = mysqli_insert_id($conn);

            if($test_categories) {
                foreach($test_categories as $test_category) {
                    $sql = "INSERT INTO Test_Cate (C_ID, T_ID) VALUES ($test_category, $test_id)";
                    if(mysqli_query($conn, $sql) == 0) {
                        die("Failed to update Test_Cate table!");
                    }
                }
            }

            for($i = 0; $i < $num_of_questions; $i++) {
                $sql = "INSERT INTO Question (T_ID, Content, Option_A, Option_B, Option_C, Option_D, Answer)
                        VALUES ($test_id, '$question_name[$i]', '$option_a[$i]', '$option_b[$i]', '$option_c[$i]', '$option_d[$i]', '$question_answer[$i]')";
                if(mysqli_query($conn, $sql) == 0) {
                    die("Failed to add question!");
                }
            }

            $create_test_msg = "Test is created!";
            $create_success = 1;
        }
        else {
            $create_test_msg = "Something went wrong!";
            $create_success = 0;
        }
    }
?>