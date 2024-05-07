<?php
$conn = mysqli_connect("localhost", "Group6", "Group6", "Group6");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$petId = $_POST["petId"];

$sql = "SELECT PetStatus FROM petprofile WHERE PetID = '$petId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $petStatus = $row["PetStatus"];
    echo $petStatus;
} else {
    echo "No pet status found for the selected pet ID.";
}

$conn->close();
?>
