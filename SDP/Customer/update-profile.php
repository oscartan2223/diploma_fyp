<?php

    include "src/session.php";
    include "src/conn.php";
    $customerID = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $editedCusName = $_POST['CusName'];
        $editedCusBirthday = $_POST['CusBirthday'];
        $editedCusPhone = $_POST['CusPhone'];
        $editedCusEmail = $_POST['CusEmail'];
        $editedCusPassword = $_POST['CusPassword'];
                        
        $updateQuery="UPDATE customer SET CusName='$editedCusName',CusPassword='$editedCusPassword',CusBirthday='$editedCusBirthday',CusPhone=$editedCusPhone,CusEmail='$editedCusEmail' WHERE CustomerID = '$customerID'";

                            
        //verify error
        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Profile has update");</script>';
        } else {
            echo '<script>alert("Error update Appointment");</script>' . mysqli_error($conn);
        }
    }
    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Customer/ownerProfile.php")
    ?>