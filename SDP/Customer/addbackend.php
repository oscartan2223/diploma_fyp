<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $customerID = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve pet data from the form
        $petName = $_POST['petName'];
        $petType = $_POST['petType'];
        $petGender = $_POST['petGender'];
        $petAge = $_POST['petAge'];

        // Insert the pet details into the petprofile table
        $insertQuery = "INSERT INTO petprofile (CustomerID, PetName, PetType, PetGender, PetAge) VALUES ('$customerID', '$petName', '$petType', '$petGender', '$petAge')";

        if (mysqli_query($conn, $insertQuery)) {
            echo '<script>alert("Pet has been added successfully.");</script>';
        } else {
            echo '<script>alert("Error adding pet: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Customer/viewpet.php")
?>
