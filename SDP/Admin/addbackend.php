<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve pet data from the form
        $staffName = $_POST['staffName'];
        $staffEmail = $_POST['staffEmail'];
        $staffPassword = $_POST['staffPassword'];
        $staffEmaillow = strtolower($staffEmail);

        if (!preg_match("/^[a-zA-Z ]+$/", $staffName)) {
            // Handle invalid name
            echo "<script>alert('Name only contains alphabets.');</script>";
            echo "<script>window.location.href = 'addstaff.php';</script>";
        } elseif (!filter_var($staffEmail, FILTER_VALIDATE_EMAIL)) {
            // Handle invalid email
            echo "<script>alert('Invalid email address.');</script>";
            echo "<script>window.location.href = 'addstaff.php';</script>";
        } elseif (strlen($staffPassword) < 8) {
            // Handle password length
            echo "<script>alert('Password must be at least 8 characters long.');</script>";
            echo "<script>window.location.href = 'addstaff.php';</script>";
        }else{
        $checksql = "SELECT * FROM staff";
        $checkresult = mysqli_query($conn, $checksql);
        $list = [];
        $checkvalue = 0;
        if (mysqli_num_rows($checkresult) > 0) {
            while($checkrow = mysqli_fetch_assoc($checkresult)) {
                $list[] = $checkrow['StaffEmail'];
             }
        }
        foreach ($list as $each){
            if ($each === $staffEmaillow){
                $checkvalue = 1;
            }
        }
        mysqli_close($conn);
        //Using checkvalue verify the validate email 
        if ($checkvalue === 0){
            include "src/conn.php";
            // Check the connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $query = "INSERT INTO staff (StaffName, StaffEmail, StaffPassword) VALUES ('$staffName', '$staffEmaillow', '$staffPassword')";
            $execval = $conn->query($query);
            
            echo '<script>alert("Registration was made");</script>';
            header("Location: http://localhost/Admin/viewstaff.php");
            $conn->close();
        }else{
            echo "<script>alert('Email has been registered');</script>";    
        }   
    }
}
?>

