<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login.css">
        <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
        <title>Login Page</title>
    </head>
    <body>
        <section>
            <div class="formBox">
                <div class="formValue">
                    <form action="loginbackend.php" method = "post">
                        <h2>Login</h2>
                        <div class="inputbox">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" required>
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" required>
                            <label for="">Password</label>
                        </div>
                        <button>Log in</button>
                        <div class="register">
                            <p> Don't have an account? <a href="register.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>