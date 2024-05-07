<?php
include "src/session.php"

?>


<!DOCTYPE html>
<html>
    <head>
        <title>PetCare System</title>
        <link rel="stylesheet" href="viewappointment.css">
        <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="navbar">
            <nav>
                <img src="petpal.png">
                <ul>
                    <li><a href="CliMain.php">Home</a></li>
                    <li><a href="viewappointment.php">Appointment</a></li>
                    <li><a href="updateappointment.php">Update Appointment</a></li>
                    <li><a href="updateprice.php">Update Price</a></li>
                </ul>
                <a href="clinicprofile.php"><i class="fa-solid fa-user"></i></a>  
            </nav>
            <div class="container">
                <div class="appointment">
                    <h1>View Appointment</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>AppointmentID</th>
                            <th>CustomerID</th>
                            <th>ServiceID</th>
                            <th>Pet Name</th>
                            <th>Appointment Date Time</th>
                            <th>Checkout Date Time</th>
                            <th>Contact</th>
                            <th>Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                    include "src/conn.php";
                    $ClinicID = $_SESSION['id'];
                    $query = "SELECT * FROM appointment WHERE ClinicID = $ClinicID";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['AppointmentID'] . "</td>";
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