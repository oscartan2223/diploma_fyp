<?php
include "src/session.php";
include "src/conn.php"; // Include the connection file

// Get the customer ID from the session
$AdminID = $_SESSION['id'];
$query = "SELECT AdminName FROM admin WHERE AdminID = $AdminID";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the customer name
    $row = mysqli_fetch_assoc($result);
    $adminName = $row['AdminName'];
} else {
    // Default name if no customer found
    $adminName = "Error";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PetPal - Admin Profile</title>
    <link rel="stylesheet" type="text/css" href="adminprofile.css">
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
                    <a href="adminprofile.php" class="active"><span class="fa-solid fa-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="notification.php"><span class="fa-solid fa-bell"></span>
                    <span>Notification</span></a>
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
                <li><a href="AdminMain.php">Home</a></li>
                <li><a href="viewstaff.php">Staff</a></li>
                <li><a href="viewappointment.php">Appointment</a></li>
                <li><a href="report.php">Report</a></li>
                </ul>
            </nav>
            <div class="user-wrapper">
                
                <div>
                <h4><?php echo $adminName; ?></h4>
                <small>Admin</small>
                </div>
            </div>
        </header>
            <div class="container">
                <div class="profile">
                    <?php
                        include "src/conn.php";
                                        
                        $sql = "SELECT * FROM admin WHERE AdminID='$AdminID'";
                        // Fetch all the customer details from the database

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $AdminName = $row['AdminName'];
                            $AdminEmail = $row['AdminEmail'];
                            $AdminPassword = $row['AdminPassword'];
                        }
                    ?>
                    <form method="POST" action="updateprofile.php">
                        <h1>Personal Info</h1>
                        <h2>Name</h2>
                        <input type="text" name="AdminName" class="input" value="<?php echo $AdminName?>">
                        <h2>Email</h2>
                        <input type="email" name="AdminEmail" class="input" value="<?php echo $AdminEmail?>">
                        <h2>Password</h2>
                        <input type="password" name="AdminPassword" class="input" value="<?php echo $AdminPassword?>">
                        <button class="btn">Update</button>
                    </form>
                    
                </div>
            </div>
    </div>
</body>
</html>