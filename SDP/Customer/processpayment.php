<?php
include "src/session.php";
include "src/conn.php";

$paymethod = $_POST['paymethod'];
$paystatus = "Success";

// Database connection
if($conn->connect_error){
    echo "$conn->connect_error";
    die("<script> alert('An Error Occour');</script>". $conn->connect_error);
} else {
	$TransactionID = $_GET['TransactionID'];
    $query = "INSERT into transaction(TransactionID, Method, Status) values('$TransactionID', '$paymethod', '$paystatus' )";
	$execval = $conn->query($query);
	echo $execval;
	echo '<script>alert("Booking was made");</script>';
	$conn->close();
	header('Location: http://localhost/Customer/viewAppointment.php');

}

