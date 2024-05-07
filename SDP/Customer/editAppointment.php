<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $customerID = $_SESSION['id'];

    // Retrieve appointment data
    if (isset($_GET['AppointmentID'])) {
        $appointment_id = $_GET['AppointmentID'];
        $sql = "SELECT * FROM appointment WHERE AppointmentID='$appointment_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $CustomerID = $row['CustomerID'];
            $ServiceID = $row['ServiceID'];
            $AppointmentDateTime = $row['AppointmentDateTime'];
            $PetName = $row['PetName'];
            $CheckOutDateTime = $row['CheckoutDateTime'];
            $ContactNumber = $row['Contact'];

            $appointmentdate = date("Y-m-d", strtotime($AppointmentDateTime));
            $appointmenttime = date("g:i A", strtotime($AppointmentDateTime));

            $checkoutdate = date ("Y-m-d", strtotime($CheckOutDateTime));
            $checkouttime = date ("g:i A", strtotime($CheckOutDateTime));
        } else {
            echo "No appointment found with ID $appointment_id";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
    <link rel="stylesheet" type="text/css" href="edit_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
    <centre>
        <div class="box">
            <br><h1 style="font-size: 24px;">Edit Appointment</h1>
            <form method="POST" action="">
                <div class="line-starts">
                    <br><label for="CustomerID">CustomerID:</label>
                    <label><?php echo $CustomerID; ?></label><br>

                    <br>
                    <label for="Service ID">Service ID:</label>
                    <select name="ServiceID">
                        <?php
                        $serviceIDs = array(
                            'P1 Pet Grooming',
                            'P2 Pet Boarding',
                            'P3 Pet Transportation',
                            'P4 Pet Training',
                            'P5 Pet Surgery Aftercare',
                            'M1 Wellness Examination',
                            'M2 Vaccinations',
                            'M3 Parasite Control',
                            'M4 Dental Care',
                            'M5 Microchipping',
                            'M6 Surgery'
                        );

                        foreach ($serviceIDs as $serviceID) {
                            $selected = ($serviceID == $ServiceID) ? 'selected' : '';
                            echo "<option value='$serviceID' $selected>$serviceID</option>";
                        }
                        ?>
                </select>
                <br>

                <br><label for="AppointmentDate">Appointment Date:</label>
                <input type="date" name="appointment_date" value="<?php echo $appointmentdate; ?>"><br>

                <br><label for="appointment_time">Appointment Time:</label>
                <select name="appointment_time" id="appointment_time">
                    <?php
                    $appointmentTimes = array(
                        '9:00 AM',
                        '10:00 AM',
                        '11:00 AM',
                        '12:00 PM',
                        '1:00 PM',
                        '2:00 PM',
                        '3:00 PM',
                        '4:00 PM',
                        '5:00 PM'
                    );

                    $matched = false;
                    foreach ($appointmentTimes as $time) {
                        $selected = ($time == $appointmenttime) ? 'selected' : '';
                        echo "<option value='$time' $selected>$time</option>";

                        if ($time == $appointmenttime) {
                            $matched = true;
                        }
                    }

                    if (!$matched) {
                        echo "<option value='$appointmenttime' selected>No manual data allowed</option>";
                    }
                    ?>
                </select><br>

                <br><label for="pet_name">Pet Name:</label>
                <input name="petName" value="<?php echo $PetName; ?>"><br>

                <br><label for="contact">Contact Number:</label>
                <input name="contactNumber" value="<?php echo $ContactNumber; ?>"><br>
            </div>
            <br><input type="submit" value="Edit">
        </form>

        <?php
        include "src/conn.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the edited values from the form
            $editedAppointmentDate = $_POST['appointment_date'];
            $editedAppointmentTime = $_POST['appointment_time'];
            $editedServiceID = $_POST['ServiceID'];
            $editedPetName = $_POST['petName'];
            $editedContactNumber = $_POST['contactNumber'];

            $appointmentTimeValue = date('H:i:s', strtotime($editedAppointmentTime));

            // Update the appointment record in the database
            $updateSql = "UPDATE appointment SET 
                            AppointmentDateTime = STR_TO_DATE('$editedAppointmentDate $appointmentTimeValue', '%Y-%m-%d %H:%i:%s'),
                            ServiceID = '$editedServiceID',
                            PetName = '$editedPetName',
                            Contact = '$editedContactNumber'
                        WHERE AppointmentID = '$appointment_id'";

            if (mysqli_query($conn, $updateSql)) {
                mysqli_close($conn);
                header("Location: http://localhost/Customer/viewAppointment.php"); // Redirect to the desired location
                exit();
            } else {
                echo "Error updating appointment: " . mysqli_error($conn);
            }
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</centre>
</body>
</html>