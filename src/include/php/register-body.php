<div class="page login-page">
    <div class="container">
        <h1>Create An Account</h1>

        <div class="login-error text-center mb-4">
            <?php
                echo $register_error;
            ?>
        </div>
        
        <div class="login-box">
            <form action="" method="post">
                <div class="mb-4">
                    <label for="formControlUsername" class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="formControlUsername" placeholder="Please enter Username">
                </div>

                <div class="mb-4">
                    <label for="formControlName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="formControlName" placeholder="Please enter your name">
                </div>

                <div class="mb-4">
                    <label for="formControlPassword" class="form-label">Password</label>
                    <input type="password" name="pass1" class="form-control" id="formControlPassword" placeholder="Please enter password">
                </div>

                <div class="mb-5">
                    <label for="formControlConfirm" class="form-label">Confirm Password</label>
                    <input type="password" name="pass2" class="form-control" id="formControlConfirm" placeholder="Please confirm password">
                </div>
    
                <button class="login-btn" type="submit" name="register">Register</button>

                <div class="create-link">
                    Have an account already?
                    <a href="index.php?page=login">Please log in here!</a>
                </div>
            </form>
        </div>
    </div>
</div>