<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $customerID = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $PetID = $_POST['PetID'];
        $editedPetName = $_POST['PetName'];
        $editedPetType = $_POST['PetType'];
        $editedPetGender = $_POST['PetGender'];
        $editedPetAge = $_POST['PetAge'];
       
        $updateQuery = "UPDATE petprofile SET PetName='$editedPetName', PetType='$editedPetType', PetGender='$editedPetGender', PetAge='$editedPetAge' WHERE PetID='$PetID' AND CustomerID='$customerID'";

        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Profile has been updated.");</script>';
        } else {
            echo '<script>alert("Error updating profile: ' . mysqli_error($conn) . '");</script>';
        }
    }

    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Customer/viewpet.php")
?>
