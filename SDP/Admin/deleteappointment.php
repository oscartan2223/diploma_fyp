<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $AdminID = $_SESSION['id'];

    // Retrieve appointment data
    if (isset($_GET['AppointmentID'])) {
        $AppointmentID = $_GET['AppointmentID'];
        $sql = "SELECT * FROM appointment WHERE AppointmentID='$AppointmentID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $CustomerID = $row['CustomerID'];
            $ServiceID = $row['ServiceID'];
            $StaffID = $row['StaffID'];
            $PetName = $row['PetName'];
            $AppointmentDateTime = $row['AppointmentDateTime'];
            $CheckoutDateTime = $row['CheckoutDateTime'];
            $Contact = $row['Contact'];
            $Status = $row['Status'];
        } else {
            echo "No appointment found with ID $AppointmentID";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="deleteappointment.css">

</head>
<body>

<div class="container">

    <form action="deletebackendapp.php" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">Delete Appointment</h3>

                <div class="inputBox">
                    <span>Appointment ID :</span>
                    <label><?php echo $AppointmentID; ?></label>
                    <input type="hidden" name="AppointmentID" value="<?php echo $AppointmentID; ?>">
                </div>
                <div class="inputBox">
                    <span>Customer ID :</span>
                    <label><?php echo $CustomerID; ?></label>
                    <input type="hidden" name="CustomerID" value="<?php echo $CustomerID; ?>">
                </div>
                <div class="inputBox">
                    <span>Service ID :</span>
                    <label><?php echo $ServiceID; ?></label>
                    <input type="hidden" name="ServiceID" value="<?php echo $ServiceID; ?>">
                </div>
                <div class="inputBox">
                    <span>Staff ID :</span>
                    <label><?php echo $StaffID; ?></label>
                    <input type="hidden" name="Staff ID" value="<?php echo $StaffID; ?>">
                </div>
                <div class="inputBox">
                    <span>Pet Name :</span>
                    <label><?php echo $PetName; ?></label>
                    <input type="hidden" name="PetName" value="<?php echo $PetName; ?>">
                </div>
                <div class="inputBox">
                    <span>Appointment Date Time :</span>
                    <label><?php echo $AppointmentDateTime; ?></label>
                    <input type="hidden" name="AppointmentDateTime" value="<?php echo $AppointmentDateTime; ?>">
                </div>
                <div class="inputBox">
                    <span>Checkout Date Time :</span>
                    <label><?php echo $CheckoutDateTime; ?></label>
                    <input type="hidden" name="CheckoutDateTime" value="<?php echo $CheckoutDateTime; ?>">
                </div>
                <div class="inputBox">
                    <span>Contact :</span>
                    <label><?php echo $Contact; ?></label>
                    <input type="hidden" name="Contact" value="<?php echo $Contact; ?>">
                </div>
                <div class="inputBox">
                    <span>Status :</span>
                    <label><?php echo $Status; ?></label>
                    <input type="hidden" name="Status" value="<?php echo $Status; ?>">
                </div>
             </div> 
            </div>
        <input type="submit" value="Delete" class="submit-btn">
    </form>
</div>    
</body>
</html>