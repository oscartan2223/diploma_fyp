<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $AdminID = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $StaffID = $_POST['StaffID'];
        $editedStaffName = $_POST['StaffName'];
        $editedStaffEmail = $_POST['StaffEmail'];
        $editedStaffPassword = $_POST['StaffPassword'];
       
        $updateQuery = "UPDATE staff SET StaffName=' $editedStaffName', StaffEmail='$editedStaffEmail', StaffPassword='$editedStaffPassword' WHERE StaffID='$StaffID'";

        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Profile has been updated.");</script>';
        } else {
            echo '<script>alert("Error updating profile: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Admin/viewstaff.php")
?>
