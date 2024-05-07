<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $AdminID = $_SESSION['id'];

    // Retrieve appointment data
    if (isset($_GET['StaffID'])) {
        $StaffID = $_GET['StaffID'];
        $sql = "SELECT * FROM staff WHERE StaffID='$StaffID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $StaffName = $row['StaffName'];
            $StaffEmail = $row['StaffEmail'];
            $StaffPassword = $row['StaffPassword'];
        } else {
            echo "No staff found with ID $StaffID";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="editstaff.css">

</head>
<body>

<div class="container">

    <form action="updatestaff.php" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">Edit Staff Info</h3>

                <div class="inputBox">
                    <span>Staff ID :</span>
                    <label><?php echo $StaffID; ?></label>
                    <input type="hidden" name="StaffID" value="<?php echo $StaffID; ?>">
                </div>
                <div class="inputBox">
                    <span>Staff Name :</span>
                    <input type="text" name="StaffName" value="<?php echo $StaffName; ?>" placeholder="Bucky" required>
                </div>
                <div class="inputBox">
                    <span>Staff Email :</span>
                    <input type="email" name="StaffEmail" value="<?php echo $StaffEmail; ?>" placeholder="example@gmail.com"required>
                </div>
                <div class="inputBox">
                    <span>Staff Password :</span>
                    <input type="password" name="StaffPassword" value="<?php echo $StaffPassword; ?>" required>
                </div>
             </div> 
            </div>
        <input type="submit" value="Update" class="submit-btn">
    </form>
</div>    
</body>
</html>