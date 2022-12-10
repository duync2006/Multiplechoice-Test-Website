<div class="page login-page">
    <div class="container">
        <h1>Edit Category</h1>
        <div class="<?php echo ($edit_success == 1 ? 'text-success' : ''); ?> login-error text-center mb-4">
            <?php echo $edit_category_msg; ?>
        </div>
        <div class="login-box">
            <form action="" method="post">
                <div class="mb-5">
                    <input type="hidden" name="category-id" value="<?= $category_item['ID'] ?>">
                    <label for="formControlCategory" class="form-label">Category name</label>
                    <input type="text" name="category-name" class="form-control" id="formControlCategory" value="<?= $category_item['Name'] ?>">
                </div>
    
                <button class="login-btn create-category-btn" type="submit" name="edit-category">Confirm</button>
            </form>
        </div>
    </div>
</div>