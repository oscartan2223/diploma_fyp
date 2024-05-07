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
    <title>PetPal - Owner Profile</title>
    <link rel="stylesheet" type="text/css" href="ownerProfile.css">
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
                    <a href="ownerProfile.php" class="active"><span class="fa-solid fa-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="viewpet.php"><span class="fa-solid fa-paw"></span>
                    <span>Pet</span></a>
                </li>
                <li>
                    <a href="viewAppointment.php"><span class="fa-solid fa-calendar-check"></span>
                    <span>Appointment</span></a>
                </li>
                <li>
                    <a href="uploadtest.php" ><span class="fa-solid fa-dog"></span>
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
                <div class="header-title">
                    <label for="nav-toggle">
                        <span class="fa-solid fa-bars"></span>
                    </label>
                    Menu
                </div>
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
                <div class="profile">
                    <?php
                        include "src/conn.php";
                      
                        $customerID = $_SESSION['id'];
                        // Establish a connection to the database
                        
                        
                        $sql = "SELECT * FROM customer WHERE CustomerID='$customerID'";
                        // Fetch all the customer details from the database

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $CusName = $row['CusName'];
                            $CusBirthday = $row['CusBirthday'];
                            $CusPhone = $row['CusPhone'];
                            $CusEmail = $row['CusEmail'];
                            $CusPassword = $row['CusPassword'];
                        }
                    ?>
                    <form method="POST" action="update-profile.php">
                        <h1>Personal Info</h1>
                        <h2>Full Name</h2>
                        <input type="text" name="CusName" class="input" value="<?php echo $CusName?>" required>
                        <h2>Birthday</h2>
                        <input type="date" name="CusBirthday" class="input" value="<?php echo $CusBirthday?>" required>
                        <h2>Phone Number</h2>
                        <input type="text" name="CusPhone" class="input" value="<?php echo $CusPhone?>" required>
                        <h2>Email</h2>
                        <input type="email" name="CusEmail" class="input" value="<?php echo $CusEmail?>" required>
                        <h2>Password</h2>
                        <input type="password" name="CusPassword" class="input" value="<?php echo $CusPassword?>" required>
                        <button class="btn">Update</button>
                    </form>
                    
                </div>
            </div>
    </div>
</body>
</html>