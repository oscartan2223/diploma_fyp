<?php
$conn = mysqli_connect("localhost", "Group6", "Group6", "Group6");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$petId = $_POST["petId"];

$sql = "SELECT PetImage FROM petprofile WHERE PetID = '$petId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $petImage = $row["PetImage"];
    echo $petImage;
} else {
    echo "No pet image found for the selected pet ID.";
}

$conn->close();
?>
