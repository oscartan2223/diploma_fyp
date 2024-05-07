<?php

    include "src/session.php";
    include "src/conn.php";
    $StaffID = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $editedStaffName = $_POST['StaffName'];
        $editedStaffEmail = $_POST['StaffEmail'];
        $editedStaffPassword = $_POST['StaffPassword'];
                        
        $updateQuery="UPDATE staff SET StaffName='$editedStaffName',StaffEmail='$editedStaffEmail',StaffPassword='$editedStaffPassword' WHERE StaffID = '$StaffID'";

                            
        //verify error
        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Profile has update");</script>';
        } else {
            echo '<script>alert("Error update Profile");</script>' . mysqli_error($conn);
        }
    }
    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Staff/staffprofile.php")
    ?>