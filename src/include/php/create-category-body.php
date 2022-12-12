<div class="page login-page">
    <div class="container">
        <h1>Create Category</h1>
        <div class="<?php echo ($create_success == 1 ? 'text-success' : ''); ?> login-error text-center mb-4">
            <?php echo $create_category_msg; ?>
        </div>
        <div class="login-box">
            <form action="" method="post">
                <div class="mb-5">
                    <label for="formControlCategory" class="form-label">Category name</label>
                    <input type="text" name="category-name" class="form-control" id="formControlCategory" placeholder="Please enter category name" required>
                </div>
    
                <button class="login-btn create-category-btn" type="submit" name="create-category">Create</button>
            </form>
        </div>
    </div>
</div>