<?php

    include "src/session.php";
    include "src/conn.php";
    $ClinicID = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $editedCliName = $_POST['CliName'];
        $editedCliEmail = $_POST['CliEmail'];
        $editedCliPassword = $_POST['CliPassword'];
                        
        $updateQuery="UPDATE clinic SET CliName='$editedCliName',CliEmail='$editedCliEmail',CliPassword='$editedCliPassword' WHERE ClinicID = '$ClinicID'";

                            
        //verify error
        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Profile has update");</script>';
        } else {
            echo '<script>alert("Error update Profile");</script>' . mysqli_error($conn);
        }
    }
    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Clinic/clinicprofile.php")
    ?>