<?php
include "src/session.php";
include "src/conn.php"; // Include the connection file


$AdminID = $_SESSION['id'];
$query = "SELECT AdminName FROM admin WHERE AdminID = $AdminID";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
    $adminName = $row['AdminName'];
} else {
    // Default name if no customer found
    $adminName = "Error";
}
?>
<?php

include "src/conn.php";

// Fetch notifications from the feedback table
$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);
$notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>PetPal - Admin Profile</title>
    <link rel="stylesheet" type="text/css" href="notification.css">
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
                    <a href="adminprofile.php" ><span class="fa-solid fa-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="notification.php" class="active"><span class="fa-solid fa-bell"></span>
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
        <div class="container notifications-container shadow">
    <div class="row header">
      <div class="col-7">
        <p class="title">
          Notifications
          <span class="unread-notifications-number"><?php echo count($notifications); ?></span>
        </p>
      </div>

    </div>
    <div class="row notifications">
      <div class="col-12">
        <?php foreach ($notifications as $notification): ?>
          <div class="row single-notification-box unread">
            
            <div class="col-11 notification-text">
              <p>
              <a href="email.php?FeedbackID=<?php echo $notification['FeedbackID']; ?>" class="link name"><?php echo $notification['CusName']; ?></a>
                <span class="description">has left a comment</span>
                <a href="deletenotibackend.php?FeedbackID=<?php echo $notification['FeedbackID']; ?>" class="unread-symbol">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </p>
              
              <div class="comment">
                <?php echo $notification['Comment']; ?>
              </div> 
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
    </div>
</body>
</html>