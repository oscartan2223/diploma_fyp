<!DOCTYPE html>
<html>
    <head>
        <title>PetCare System</title>
        <link rel="stylesheet" href="updatestatus1.css">
        <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="navbar">
            <nav>
                <img src="petpal.png">
                <ul>
                    <li><a href="StaffMain.php">Home</a></li>
                    <li><a href="viewappointment.php">Appointment</a></li>
                    <li><a href="updatestatus.php">Update Status</a></li>
                </ul>
                <a href="staffprofile.php"><i class="fa-solid fa-user"></i></a>  
            </nav>
            <div class="container">
                <div class="appointment">
                    <h1>View Appointment</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Customer ID</th>
                                <th>Service ID</th>
                                <th>Pet Name</th>
                                <th >Appointment Date Time</th>
                                <th>Checkout Date Time</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect("localhost","Group6","Group6","Group6");
                            
                            if (mysqli_connect_errno())
                            {
                                echo "Failed to connect to MySQL: ".mysqli_connect_error();
                            }

                            $query = "SELECT * FROM appointment";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['AppointmentID'] . "</td>";
                                    echo "<td>" . $row['CustomerID'] . "</td>";
                                    echo "<td>" . $row['ServiceID'] . "</td>"; 
                                    echo "<td>" . $row['PetName'] . "</td>";  
                                    echo "<td>" . $row['AppointmentDateTime'] . "</td>";  
                                    echo "<td>" . $row['CheckoutDateTime'] . "</td>";
                                    echo "<td>" . $row['Contact'] . "</td>";
                                    echo "<td>" . $row['Status'] . "</td>"; 
                                    echo "<td><a href='assign.php?AppointmentID=" . $row['AppointmentID'] . "' class='edit-btn'><i class='fa-solid fa-pen-to-square'></i></a></td>"; 
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No appointments found</td></tr>";
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