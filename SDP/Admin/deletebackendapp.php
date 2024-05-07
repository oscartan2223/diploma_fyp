<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the admin ID from the session
    $AdminID = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $AppointmentID = $_POST['AppointmentID'];
        
   
        $deleteQuery = "DELETE FROM appointment WHERE AppointmentID='$AppointmentID'";

        if (mysqli_query($conn, $deleteQuery)) {
            echo '<script>alert("Appointment has been deleted.");</script>';
        } else {
            echo '<script>alert("Error deleting appointment: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header("Location: http://localhost/Admin/viewappointment.php");
?>
