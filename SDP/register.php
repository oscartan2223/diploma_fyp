<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="formBox">
            <form action="registerbackend.php" method = "post" name="Formfill" >
                <h2>Register</h2>
                <p id="result"></p>
                <div class="inputbox">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="Name" placeholder="Name">
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="Email" placeholder="Email">
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-phone"></i>
                    <input type="phone" name="Phone" placeholder="Phone">
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="Password" placeholder="Password">
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="cPassword" placeholder="Confirm Password">
                </div>
                <div class="button">
                    <input type="submit" class="btn" value="Register">
                </div>
                <div class="group">
                    <span><a href="index.php">Login</a></span>
                </div>
            </form>
        </div>
        <div class="popup" id="popup">
            <i class="fa-regular fa-circle-check"></i>
            <h2>Thank you!</h2>
            <p>Registration is Success!</p>
            <p>Thanks!</p>
            <a href="index.php"><button onclick="CloseSlide">OK</button></a>
        </div>
    </div>
    <script src="register.js"></script>
</body>
</html>