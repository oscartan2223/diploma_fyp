<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ServiceID = $_POST['ServiceID'];
        $editedPrice = $_POST['Price'];

        $updateQuery = "UPDATE service SET Price=' $editedPrice' WHERE ServiceID='$ServiceID'";

        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Price has been updated.");</script>';
            header ("Location: http://localhost/Clinic/updateprice.php");
        } else {
            echo '<script>alert("Error updating price: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    
?>
