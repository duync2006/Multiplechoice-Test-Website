<div class="page login-page">
    <div class="container">
        <h1>Create Test</h1>
        <div class="<?php echo ($create_success == 1 ? 'text-success' : ''); ?> login-error text-center mb-4">
            <?php echo $create_category_msg; ?>
        </div>
        <div class="login-box">
            <form action="" method="post">
                <div class="mb-4">
                    <label class="form-label">Test name</label>
                    <input type="text" name="test-name" class="form-control" placeholder="Please enter test name" required>
                </div>

                <hr>

                <div class="row mb-4">
                    <div class="col-6">
                        <label class="form-label">Category</label>
                        <?php
                            $categories = getAll('Category');

                            if(mysqli_num_rows($categories) > 0) {
                                foreach($categories as $category) {
                                    ?>
                                    <input type="checkbox" id="category<?= $category['ID']; ?>" name="category[]" value="<?= $category['ID']; ?>">
                                    <label for="category<?= $category['ID']; ?>"><?= $category['Name']; ?></label><br>
                                    <?php
                                }
                            }
                            else {
                                echo "<b>No categories have been created!</b>";
                            }
                        ?>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Difficulty</label>
                        <select name="test-difficulty" class="w-100">
                            <option value="">Select difficulty</option>
                            <option value="1">Beginner</option>
                            <option value="2">Elementary</option>
                            <option value="3">Intermediate</option>
                            <option value="4">Upper Intermediate</option>
                            <option value="5">Advanced</option>
                            <option value="6">Proficient</option>
                        </select>
                    </div>
                </div>

                <hr>

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

                <div class="border border-1 shadow-sm bg-body mt-3 mb-5" style="width: 100%" name="add-question" id="add-question-btn"><i class="fa-solid fa-plus"></i></div>
    
                <button class="login-btn create-category-btn mt-3" style="width: 100%" type="submit" name="create-test">Create test</button>
            </form>
        </div>
    </div>
</div>