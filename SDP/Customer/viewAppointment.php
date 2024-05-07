<?php
include "src/session.php";
include "src/conn.php"; // Include the connection file

// Get the customer ID from the session
$customerID = $_SESSION['id'];
$query = "SELECT CusName FROM customer WHERE CustomerID = $customerID";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the customer name
    $row = mysqli_fetch_assoc($result);
    $customerName = $row['CusName'];
} else {
    // Default name if no customer found
    $customerName = "Error";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PetPal - View Appointment</title>
    <link rel="stylesheet" type="text/css" href="viewAppointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <h1><span>PetPal</span></h1>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="ownerProfile.php"><span class="fa-solid fa-user"></span>
                    <span>Profile</span></a>
            </li>
            <li>
                <a href="viewpet.php"><span class="fa-solid fa-paw"></span>
                    <span>Pet</span></a>
            </li>
            <li>
                <a href="viewAppointment.php" class="active"><span class="fa-solid fa-calendar-check"></span>
                    <span>Appointment</span></a>
            </li>
            <li>
                <a href="uploadtest.php"><span class="fa-solid fa-dog"></span>
                    <span>Pet Status</span></a>
            </li>
            <li>
                <a href="src/logout.php"><span class="fa-solid fa-right-from-bracket"></span>
                <span>Logout</span></a>
            </li>

        </ul>
    </div>
</div>
<div class="main-content">
    <header>
        <h3>
            <label for="nav-toggle">
                <span class="fa-solid fa-bars"></span>
            </label>
            Menu
        </h3>
        <nav>
        <ul>
            <li><a href="CusMain.php">Home</a></li>
            <li><a href="service.html">Services</a></li>
            <li><a href="medical.html">Medical Services</a></li>
            <li><a href="appointment.php">Appointment</a></li>
        </ul>
    </nav>
    <div class="user-wrapper">
        
        <div>
        <h4><?php echo $customerName; ?></h4>
        <small>Pet Owner</small>
        </div>
    </div>
    </header>
    <div class="container">
        <div class="appointment">
                <h1>View Appointments</h1>
                <table border="1">
                    <thead>
                        <tr>
                            <th style="font-size: 15px;">Customer ID</th>
                            <th>Service ID</th>
                            <th>Pet Name</th>
                            <th>Appointment Date Time</th>
                            <th>Check out Date Time</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch specific appointment details for the customer ID
                        $query = "SELECT * FROM appointment WHERE CustomerID = $customerID";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            // Output the appointment details in a table format
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['CustomerID'] . "</td>";
                                echo "<td>" . $row['ServiceID'] . "</td>";
                                echo "<td>" . $row['PetName'] . "</td>";
                                echo "<td>" . $row['AppointmentDateTime'] . "</td>";  
                                if ($row['ServiceID'] === "P2") {
                                    echo "<td>" . $row['CheckoutDateTime'] . "</td>";
                                }else{
                                    echo "<td>null</td>";
                                }
                                echo "<td>" . $row['Contact'] . "</td>";
                                echo "<td>" . $row['Status'] . "</td>";
                                echo "<td><a href='editAppointment.php?AppointmentID=" . $row['AppointmentID'] . "' class='edit-btn'><ion-icon name='pencil'></ion-icon></a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "";
                        }
                    
                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
