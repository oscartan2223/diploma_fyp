<?php
    include "src/conn.php"; // Include the connection file

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Insert the data into the database table
        $insertQuery = "INSERT INTO feedback (CusName, CusEmail, CusPhone, Subject, Comment) VALUES ('$name', '$email', '$phone', '$subject', '$message')";

        if (mysqli_query($conn, $insertQuery)) {
            echo '<script>alert("Feedback submitted successfully.");</script>';
        } else {
            echo '<script>alert("Error submitting feedback: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header('Location: http://localhost/Customer/successfeedback.php');
?>