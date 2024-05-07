<?php
include "src/conn.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CusName = $_POST["Name"];
    $CusEmail = $_POST["Email"];
    $CusPhone = $_POST["Phone"];
    $CusPassword = $_POST["Password"];
    $cPassword = $_POST["cPassword"];
    $CusEmaillow = strtolower($CusEmail);

        if (!preg_match("/^[a-zA-Z ]+$/", $CusName)) {
            // Handle invalid name
            echo "<script>alert('Name only contains alphabets.');</script>";
        } elseif (!filter_var($CusEmail, FILTER_VALIDATE_EMAIL)) {
            // Handle invalid email
            echo "<script>alert('Invalid email address.');</script>";
        } elseif (!preg_match("/^[0-9-]+$/", $CusPhone)) {
            // Handle invalid phone number
            echo "<script>alert('Invalid phone number.');</script>";
        } elseif ($CusPassword !== $cPassword) {
            // Handle password mismatch
            echo "<script>alert('Passwords do not match.');</script>";
        } elseif (strlen($CusPassword) < 8) {
            // Handle password length
            echo "<script>alert('Password must be at least 8 characters long.');</script>";
        } else {
            // Check no repeat email and assign to $checkvalue
            $checksql = "SELECT * FROM customer";
            $checkresult = mysqli_query($conn, $checksql);
            $list = [];
            $checkvalue = 0;
            if (mysqli_num_rows($checkresult) > 0) {
                while($checkrow = mysqli_fetch_assoc($checkresult)) {
                    $list[] = $checkrow['CusEmail'];
                   
                }
            }
            foreach ($list as $each){
                if ($each === $CusEmaillow){
                    $checkvalue = 1;
                }
            }
            mysqli_close($conn);

            //Using checkvalue verify the validate email 
            if ($checkvalue === 0){
                $conn = mysqli_connect("localhost","Group6","Group6","Group6");

                // Check the connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query = "INSERT into customer( CusName, CusEmail, CusPhone, CusPassword) values('$CusName', '$CusEmaillow', '$CusPhone', '$CusPassword')";
                $execval = $conn->query($query);
                
                echo '<script>alert("Registration was made");</script>';
                header('Location: index.php');
                $conn->close();
                
            }else{
                echo "<script>alert('Email has been registered');</script>";
            }   
        }
}
?>

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
            <form action="" method = "post" name="Formfill" >
                <h2>Register</h2>
                <p id="result"></p>
                <div class="inputbox">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="Name" placeholder="Name" value="<?php if (isset($CusName)){echo $CusName;}?>" required>
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="Email" placeholder="Email" value="<?php if (isset($CusEmail)){echo $CusEmail;}?>"required>
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-phone"></i>
                    <input type="phone" name="Phone" placeholder="Phone" value="<?php if (isset($CusPhone)){echo $CusPhone;}?>"required>
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="Password" placeholder="Password" value="<?php if (isset($CusPassword)){echo $CusPassword;}?>"required>
                </div>
                <div class="inputbox">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="cPassword" placeholder="Confirm Password" required>
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