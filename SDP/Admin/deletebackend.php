<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the admin ID from the session
    $AdminID = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $StaffID = $_POST['StaffID'];
        
        // Delete the staff profile from the database
        $deleteQuery = "DELETE FROM staff WHERE StaffID='$StaffID'";

        if (mysqli_query($conn, $deleteQuery)) {
            echo '<script>alert("Staff profile has been deleted.");</script>';
        } else {
            echo '<script>alert("Error deleting staff profile: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header("Location: http://localhost/Admin/viewstaff.php");
?>
