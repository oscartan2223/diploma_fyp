<?php
include "src/session.php";
include "src/conn.php"; // Include the connection file

if (isset($_GET['FeedbackID'])) {
    $FeedbackID = $_GET['FeedbackID'];
    $sql = "SELECT * FROM feedback WHERE FeedbackID='$FeedbackID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cusemail = $row['CusEmail'];
        $CusName = $row['CusName'];
        $Subject = $row['Subject'];
        $Comment = $row['Comment'];
    } else {
        echo "No feedback found with ID $FeedbackID";
    }
}
mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang ="en" dir = "ltr">
    <head>
        <meta charset="utf-8">
        <title>Send Email</title>
        <link rel="stylesheet" href="email.css">
    </head>
    <body>
    <div class="container">
        <form class="" action="send.php" method="post">
        <div class="row">

            <div class="col">
            <h3 class="title">Send Email</h3>
                <div class="inputBox">
                    <span>Feedback ID :</span>
                    <label><?php echo $FeedbackID; ?></label>
                    <input type="hidden" name="FeedbackID" value="<?php echo $FeedbackID; ?>">
                </div>
                <div class="inputBox">
                    <span>Customer Name :</span>
                    <label><?php echo $CusName; ?></label>
                    <input type="hidden" name="CusName" value="<?php echo $CusName; ?>">
                </div>
                <div class="inputBox">
                    <span>Subject :</span>
                    <label><?php echo $Subject; ?></label>
                    <input type="hidden" name="Subject" value="<?php echo $Subject; ?>">
                </div>
               
                <div class="inputBox">
                    <span>Comment :</span>
                    <label><?php echo $Comment; ?></label>
                    <input type="hidden" name="Comment" value="<?php echo $Comment; ?>">
                </div>
                <div class="inputBox">
                    <span>Customer Email :</span>
                    <label><?php echo $cusemail; ?></label>
                    <input type="hidden" name="email" value="<?php echo $cusemail; ?>">
                </div>
                <div class="inputBox">
                    <span>Subject :</span>
                    <input type="text" name = "subject" value="" required>
                </div>
                <div class="inputBox">
                    <span>Message :</span>
                    <input type="text" name = "message" value="" required>
                </div>
            
                <div class="center">
                <button class="btn" type="submit" name="send">Send</button>
                </div>
        </form>
    </div>
    </body>
</html>



