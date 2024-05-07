<?php
include"src/conn.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT CustomerID FROM customer WHERE CusEmail='$email' and CusPassword='$password'";
    $sql2 = "SELECT AdminID FROM admin WHERE AdminEmail='$email' and AdminPassword='$password'";
    $sql3 = "SELECT StaffID FROM staff WHERE StaffEmail='$email' and StaffPassword='$password'";
    $sql4 = "SELECT ClinicID FROM clinic WHERE CliEmail='$email' and CliPassword='$password'";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);
    $result4 = mysqli_query($conn, $sql4);
    if ($result) {
        $rowcount = mysqli_num_rows($result);
        $rowcount2 = mysqli_num_rows($result2);
        $rowcount3 = mysqli_num_rows($result3);
        $rowcount4 = mysqli_num_rows($result4);
        $row = mysqli_fetch_assoc($result);
        $row2 = mysqli_fetch_assoc($result2);
        $row3 = mysqli_fetch_assoc($result3);
        $row4 = mysqli_fetch_assoc($result4);
    }
    if ($rowcount == 1) {
        $_SESSION['id'] = $row['CustomerID'];
        header("location: http://localhost/Customer/CusMain.php");
    } elseif ($rowcount2 == 1) {
        $_SESSION['id'] = $row2['AdminID'];
        header("location: http://localhost/Admin/AdminMain.php");
    } elseif ($rowcount3 == 1) {
        $_SESSION['id'] = $row3['StaffID'];
        header("location: http://localhost/Staff/StaffMain.php");
    }elseif ($rowcount4 == 1) {
        $_SESSION['id'] = $row4['ClinicID'];
        header("location: http://localhost/Clinic/CliMain.php");
    }
    
     else {
        echo '<script>
                alert ("Your Login Name or Password is invalid. Please re-login");
                window.location.href = "../index.php";
                </script>';
    }
}

mysqli_close($conn);

?>