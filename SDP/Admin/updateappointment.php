<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $AdminID = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $AppointmentID = $_POST['AppointmentID'];
        $editedStaffID = $_POST['StaffID'];

        $updateQuery = "UPDATE appointment SET StaffID=' $editedStaffID' WHERE AppointmentID='$AppointmentID'";

        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Appointment has been updated.");</script>';
        } else {
            echo '<script>alert("Error updating appointment: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Admin/viewappointment.php")
?>
