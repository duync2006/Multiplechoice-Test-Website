<div class="page login-page">
    <div class="container">
        <h1>Log In To Your Account</h1>
        <div class="login-error text-center mb-4">
            <?php
                echo $login_error;
            ?>
        </div>
        <div class="login-box">
            <form action="" method="post">
                <div class="mb-4">
                    <label for="formControlUsername" class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="formControlUsername" placeholder="Please enter Username">
                </div>

                <div class="mb-5">
                    <label for="formControlPassword" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="formControlPassword" placeholder="Please enter password">
                </div>
    
                <button class="login-btn" type="submit" name="login">Login</button>

                <div class="create-link">
                    Don't have an account?
                    <a href="index.php?page=register">Create one now!</a>
                </div>
            </form>
        </div>
    </div>
</div>