<?php
include "src/conn.php";
include "src/session.php";
$customerID = $_SESSION['id'];
// Check if the form is submitted
if (isset($_POST["done"])) {
    $appointmentDate = $_POST["Appointment_Date"];
    $appointmentTime = $_POST["Appointment_Time"];
    $checkoutDate = $_POST["Checkout_Date"];
    $checkoutTime = $_POST["Checkout_Time"];
    $petName = $_POST["Pet_Name"];
    $contact = $_POST["Contact_Number"];
    $servicetype = $_POST["Service_Type"];
    $petserviceID = $_POST["PetPal_Service"];
    $medicalID = $_POST["Medical_Service"];
    $status = "Pending";

    // Perform validation
    $errors = array();

    // Validate Appointment Date and Time
    if (empty($appointmentDate)) {
        $errors[] = "Appointment Date is required";
    }

    if (empty($appointmentTime)) {
        $errors[] = "Appointment Time is required";
    }

    // Validate Checkout Date and Time
    if (!empty($checkoutDate) && empty($checkoutTime)) {
        $errors[] = "Checkout Time is required when Check-out Date is specified";
    }

    // Validate Pet Name
    if (empty($petName)) {
        $errors[] = "Pet Name is required";
    }

    // Validate Contact Number
    if (empty($contact)) {
        $errors[] = "Contact Number is required";
    }

    // Display errors or process the form
    if (count($errors) > 0) {
        // Display error messages
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        $serviceID = "";
        $clinicID = null; // Initialize clinic ID as null

        if ($servicetype === "PetPal Service") {
            $serviceID = $petserviceID;
            $clinicID = null;
        } elseif ($servicetype === "Medical Service") {
            $serviceID = $medicalID;
            $clinicID = 1; // Set clinic ID as 1 for medical service
        } else {
            echo "<p>Error: Invalid service type selected</p>";
            exit; // Stop execution if an invalid service type is selected
        }

        $appointmentDateTime = date("Y-m-d H:i:s", strtotime($appointmentDate . " " . $appointmentTime));
        $checkoutDateTime = date("Y-m-d H:i:s", strtotime($checkoutDate . " " . $checkoutTime));

        $query = "INSERT INTO appointment(CustomerID, ServiceID, ClinicID, appointmentDateTime, checkoutDateTime, PetName, Contact, Status) VALUES('$customerID','$serviceID','$clinicID','$appointmentDateTime', '$checkoutDateTime', '$petName', '$contact','$status')";
        $execval = $conn->query($query);
        if ($execval) {
            echo '<script>alert("Successfully booked");</script>';
           

            

            echo "<p>Form submitted successfully</p>";
        } else {
            echo "<p>Error: Failed to retrieve service information</p>";
        }

        

        $getidsql = "SELECT * FROM appointment";
        $fresult = mysqli_query($conn, $getidsql);
        $getvalue = 0;
        if (mysqli_num_rows($fresult) > 0) {
            // Output the appointment details in a table format
            while($frow = mysqli_fetch_assoc($fresult)) {
                $temvalue = $frow['AppointmentID'];
                if ($temvalue > $getvalue){
                    $getvalue = $temvalue;
                }
            }
        }
        $passingvalue = $getvalue;
        $query1 = "UPDATE appointment SET TransactionID = '$passingvalue' WHERE appointmentID='$passingvalue'";
        if (mysqli_query($conn, $query1)) {
            echo '<script>alert("Appointment has been updated.");</script>';
        } else {
            echo '<script>alert("Error updating appointment: ' . mysqli_error($conn) . '");</script>';
        }

        header( "Location: http://localhost/Customer/payment.php?TransactionID=".$passingvalue);
        $conn->close();
    }
}
?>