<?php
    include "src/session.php";
    include "src/conn.php"; // Include the connection file

    // Get the customer ID from the session
    $customerID = $_SESSION['id'];

    // Retrieve appointment data
    if (isset($_GET['PetID'])) {
        $PetID = $_GET['PetID'];
        $sql = "SELECT * FROM petprofile WHERE PetID='$PetID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $PetID = $row['PetID'];
            $CustomerID = $row['CustomerID'];
            $PetName = $row['PetName'];
            $PetType = $row['PetType'];
            $PetGender = $row['PetGender'];
            $PetAge = $row['PetAge'];

            $customerQuery = "SELECT CusName FROM customer WHERE CustomerID='$CustomerID'";
            $customerResult = mysqli_query($conn, $customerQuery);
            if (mysqli_num_rows($customerResult) > 0) {
                $customerRow = mysqli_fetch_assoc($customerResult);
                $customerName = $customerRow['CusName'];
            } else {
                $customerName = "Unknown";
            }

        } else {
            echo "No pet found with ID $PetID";
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="editpet.css">

</head>
<body>

<div class="container">

    <form action="updatepet.php" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">Edit Pet Info</h3>

                <div class="inputBox">
                    <span>Pet ID :</span>
                    <label><?php echo $PetID; ?></label>
                    <input type="hidden" name="PetID" value="<?php echo $PetID; ?>">
                </div>
                <div class="inputBox">
                    <span>Customer Name :</span>
                    <label><?php echo $customerName; ?></label>
                </div>
                <div class="inputBox">
                    <span>Pet Name :</span>
                    <input type="text" name="PetName" value="<?php echo $PetName; ?>" placeholder="Lilia">
                </div>
                <div class="inputBox">
                    <span>Pet Type :</span>
                    <input type="text" name="PetType" value="<?php echo $PetType; ?>"placeholder="Corgi">
                </div>
                <div class="inputBox">
                    <span>Pet Gender :</span>
                    <input type="text" name="PetGender" value="<?php echo $PetGender; ?>"placeholder="Male/Female">
                </div>
                <div class="inputBox">
                    <span>Pet Age :</span>
                    <input type="text" name="PetAge" value="<?php echo $PetAge; ?>">
                </div>

               

            </div> 
    
        </div>

        <input type="submit" value="Update" class="submit-btn">

    </form>

</div>    
    
</body>
</html>