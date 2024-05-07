<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file


    // Retrieve appointment data
    if (isset($_GET['ServiceID'])) {
        $ServiceID = $_GET['ServiceID'];
        $sql = "SELECT * FROM service WHERE ServiceID='$ServiceID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $ServiceID = $row['ServiceID'];
            $ServiceName = $row['ServiceName'];
            $Price = $row['Price'];
        } else {
            echo "No service found with ID $ServiceID";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="price.css">

</head>
<body>

<div class="container">

    <form action="pricebackend.php" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Status</h3>

                
                <div class="inputBox">
                    <span>Service ID :</span>
                    <label><?php echo $ServiceID; ?></label>
                    <input type="hidden" name="ServiceID" value="<?php echo $ServiceID; ?>">
                </div>
                <div class="inputBox">
                    <span>Service Name :</span>
                    <label><?php echo $ServiceName; ?></label>
                    <input type="hidden" name="ServiceName" value="<?php echo $ServiceName; ?>">
                </div>
                <div class="inputBox">
                    <span>Price :</span>
                    <input type="number" name = "Price" value="<?php echo $Price; ?>" required>
                </div>
                
            </div>
            </div>
      
    
        <input type="submit" value="Update" class="submit-btn">

    </form>

</div>    
    
</body>
</html>