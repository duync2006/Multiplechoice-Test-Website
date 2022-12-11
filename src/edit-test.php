<?php
  session_start();
  include('./include/php/session.php');
  if($user_level != 1) {
    header("Location: index.php?page=home");
  }
  else {
    if(isset($_GET["id"])) {
        include('./include/php/function.php');
        $test_id = $_GET["id"];
        $get_test_query = getByID('Test', $test_id);
        if(mysqli_num_rows($get_test_query) > 0) {
            include('./include/php/create-test_processing.php');
        }
        else {
            die("Test does not exist!");
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
    $get_test_query = getByID('Test', $test_id);
    $test_item = mysqli_fetch_array($get_test_query);
    $test_questions = mysqli_query($conn, "SELECT * FROM Question WHERE T_ID='$test_id'");
    include('./include/php/edit-test-body.php')
  ?>
  <?php
    include('./include/html/footer.html');
  ?>
</body>

<script src="./js/header.js"></script>

<script>
  questionCardActivate();

  function questionCardActivate() {
    var questionCards = document.getElementsByClassName("question-card");

    for(var i = 0; i < questionCards.length; i++) {
        questionCards[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("border-start border-4 border-primary active");

            if(current.length > 0) {
                current[0].classList.remove("border-start", "border-4", "border-primary", "active");
            }

            this.classList.add("border-start", "border-4", "border-primary", "active");

            var currentQuestionCard = this;
            
            var deleteQuestionBtn = this.getElementsByClassName("delete-question-btn");
            deleteQuestionBtn[0].addEventListener("click", function() {
                currentQuestionCard.remove();
            });
        })
    }
  }

  var addQuestionBtn = document.getElementById("add-question-btn");
  addQuestionBtn.addEventListener("click", function() {
    var html = `
        <div class="card shadow-sm p-2 mx-auto mb-5 bg-body question-card" style="--bs-border-opacity: .8">
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">Question</label>
                    <input type="text" name="question-name[]" class="form-control" placeholder="Please enter question" required>
                </div>

                <div class="question-body">
                    <hr>

                    <div class="mb-2">
                        <label class="form-label">Options</label>
                        <input type="text" name="option-a[]" class="form-control" placeholder="Please enter option A" required>
                    </div>

                    <div class="mb-2">
                        <input type="text" name="option-b[]" class="form-control" placeholder="Please enter option B" required>
                    </div>

                    <div class="mb-2">
                        <input type="text" name="option-c[]" class="form-control" placeholder="Please enter option C (optional)">
                    </div>

                    <div class="mb-4">
                        <input type="text" name="option-d[]" class="form-control" placeholder="Please enter option D (optional)">
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-8">
                            <label class="form-label">Answer</label>
                            <select name="answer[]" class="w-100 answer-select" style="font-size: 20px; margin-top: 15px" required>
                                <option value="">Select answer</option>
                                <option value="A">Option A</option>
                                <option value="B">Option B</option>
                                <option value="C">Option C</option>
                                <option value="D">Option D</option>
                            </select>
                        </div>
                        <div class="col-4 text-end">
                            <label class="form-label">Delete</label>
                            <div class="delete-question">
                                <i class="fa-solid fa-trash border border-1 delete-question-btn"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    addQuestionBtn.insertAdjacentHTML("beforebegin", html);

    questionCardActivate();
  })
</script>
</html>