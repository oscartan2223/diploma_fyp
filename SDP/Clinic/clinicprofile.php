<?php
include "src/session.php";
include "src/conn.php"; // Include the connection file

// Get the customer ID from the session
$ClinicID = $_SESSION['id'];
$query = "SELECT CliName FROM clinic WHERE ClinicID = $ClinicID";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the customer name
    $row = mysqli_fetch_assoc($result);
    $clinicName = $row['CliName'];
} else {
    // Default name if no customer found
    $clinicName = "Error";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PetPal - Clinic Profile</title>
    <link rel="stylesheet" type="text/css" href="clinicprofile.css">
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
                    <a href="clinicprofile.php"class="active"><span class="fa-solid fa-user"></span>
                    <span>Profile</span></a>
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
                <li><a href="CliMain.php">Home</a></li>
                <li><a href="viewappointment.php">Appointment</a></li>
                <li><a href="updateappointment.php">Update Appointment</a></li>
                <li><a href="updateprice.php">Update Price</a></li>
                </ul>
            </nav>
            <div class="user-wrapper">
                
                <div>
                <h4><?php echo $clinicName; ?></h4>
                <small>Clinic</small>
                </div>
            </div>
        </header>
            <div class="container">
                <div class="profile">
                    <?php
                        include "src/conn.php";
                      
                        $ClinicID = $_SESSION['id'];
                        // Establish a connection to the database
                        
                        
                        $sql = "SELECT * FROM clinic WHERE ClinicID='$ClinicID'";
                        // Fetch all the customer details from the database

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $CliName = $row['CliName'];
                            $CliEmail = $row['CliEmail'];
                            $CliPassword = $row['CliPassword'];
                        }
                    ?>
                    <form method="POST" action="updateprofile.php">
                        <h1>Personal Info</h1>
                        <h2>Name</h2>
                        <input type="text" name="CliName" class="input" value="<?php echo $CliName?>">
                        <h2>Email</h2>
                        <input type="email" name="CliEmail" class="input" value="<?php echo $CliEmail?>">
                        <h2>Password</h2>
                        <input type="password" name="CliPassword" class="input" value="<?php echo $CliPassword?>">
                        <button class="btn">Update</button>
                    </form>
                    
                </div>
            </div>
    </div>
</body>
</html>