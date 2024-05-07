<?php

    include "src/session.php";
    include "src/conn.php";
    $AdminID = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $editedAdminName = $_POST['AdminName'];
        $editedAdminEmail = $_POST['AdminEmail'];
        $editedAdminPassword = $_POST['AdminPassword'];
                        
        $updateQuery="UPDATE admin SET AdminName='$editedAdminName',AdminEmail='$editedAdminEmail',AdminPassword='$editedAdminPassword' WHERE AdminID = '$AdminID'";

                            
        //verify error
        if (mysqli_query($conn, $updateQuery)) {
            echo '<script>alert("Profile has update");</script>';
        } else {
            echo '<script>alert("Error update Profile");</script>' . mysqli_error($conn);
        }
    }
    // Close the database connection
    mysqli_close($conn);
    header ("Location: http://localhost/Admin/adminprofile.php")
    ?>