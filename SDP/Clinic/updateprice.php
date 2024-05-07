<?php
include "src/session.php"
?>

<!DOCTYPE html>
<html>
<head>
    <title>PetCare System</title>
    <link rel="stylesheet" href="updateprice.css">
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
            <h1>Service</h1>
            <table>
                <thead>
                <tr>
                    <th>ServiceID</th>
                    <th>Service Name</th>
                    <th>Price</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "src/conn.php";

                $query = "SELECT * FROM service WHERE ServiceType = 'Medical Service'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ServiceID'] . "</td>";
                        echo "<td>" . $row['ServiceName'] . "</td>";
                        echo "<td>" . $row['Price'] . "</td>";
                        echo "<td><a href='price.php?ServiceID=" . $row['ServiceID'] . "' class='edit-btn'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No services found</td></tr>";
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
