<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the feedback ID from the query parameters
    $feedbackID = $_GET['FeedbackID'];

    // Delete the row from the feedback table
    $deleteQuery = "DELETE FROM feedback WHERE FeedbackID='$feedbackID'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Redirect back to the viewappointment.php page
    header("Location: http://localhost/Admin/notification.php");
    exit;
?>