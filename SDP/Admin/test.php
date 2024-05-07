<!DOCTYPE html>
<html>
    <head>
        <title>PetCare System</title>
        <link rel="stylesheet" href="test.css">
        <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="navbar">
        <nav>
                <img src="petpal.png">
                <ul>
                    <li><a href="AdminMain.php">Home</a></li>
                    <li><a href="viewstaff.php">Staff</a></li>
                    <li><a href="viewappointment.php">Appointment</a></li>
                    <li><a href="report.php">Report</a></li>
                </ul>
                <a href="adminprofile.php"><i class="fa-solid fa-user"></i></a>  
            </nav>
            <div class="container">
                <div class="appointment">
                <br>
            <h1>Manage Staff Account</h1>
            <table>
                    
                    <tr>
                        <th>Staff ID</th>
                        <th>Staff Name</th>
                        <th>Staff Email</th>
                        <th>Staff Password</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
            
                <tbody>
                    <?php
                    include "src/conn.php";
                    $query = "SELECT * FROM staff";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['StaffID'] . "</td>";
                        echo "<td>" . $row['StaffName'] . "</td>";
                        echo "<td>" . $row['StaffEmail'] . "</td>";
                        echo "<td>" . $row['StaffPassword'] . "</td>";  
                        echo "<td><a href='editstaff.php?StaffID=" . $row['StaffID'] . "' class='edit-btn'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                        echo "<td><a href='deletestaff.php?StaffID=" . $row['StaffID'] . "' class='delete-btn'><i class='fa-solid fa-trash'></i></a></td>";
                        echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No appointments found</td></tr>";
                    }
            
                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
                
            </table>
                </div>
            </div>
            <a href="addstaff.php" class="btn">Add</a>
                    
        
    </body>
                      

</html>