<?php
 include "src/session.php";
 include "src/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['petstatus'])) {
    $SavePetID = $_POST['PetID'];
    $SavePetStatus = $_POST['petstatus'];
    
    if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
        $SaveImage = $_FILES['imageFile']['tmp_name'];

        // Read the image file and prepare the image data for storage
        $imageData = file_get_contents($SaveImage);
        $encodedImageData = base64_encode($imageData);

        $updateSql = "UPDATE petprofile SET PetStatus = '$SavePetStatus', PetImage = '$encodedImageData' WHERE PetID = '$SavePetID'";

        if (mysqli_query($conn, $updateSql)) {
             echo "<script>alert('Pet information updated successfully.');</script>";
        } else {
            echo "Error updating pet information: " . mysqli_error($conn);
        }
    } else {
        // No image file uploaded
        $updateSql = "UPDATE petprofile SET PetStatus = '$SavePetStatus' WHERE PetID = '$SavePetID'";

        if (mysqli_query($conn, $updateSql)) {
            echo "<script>alert('Pet information updated successfully.');</script>";
        } else {
            echo "Error updating pet information: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Update Pet Status</title>
    <link rel="stylesheet" href="uploadpetstatus.css">
   <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function handleSelectionChange() {
      var selectedOption = document.getElementById("selectpetid").value;
      var statusInput = document.getElementById("statusinput");
      var imagePreview = document.getElementById("imagePreview");
      var fileInput = document.getElementById("imageFileInput");
      var uploadButton = document.getElementById("uploadButton");

      if (selectedOption !== "none") {
        statusInput.disabled = false;
        fileInput.disabled = false;
        uploadButton.disabled = false;

        // Send an AJAX request to fetch the pet status
        $.ajax({
          url: "fetch_petstatus.php", 
          method: "POST",
          data: { petId: selectedOption },
          success: function(response) {
            statusInput.value = response;
          },
          error: function() {
            statusInput.value = "Error retrieving pet status.";
          }
        });

        // Send an AJAX request to fetch the pet image
        $.ajax({
          url: "fetch_petimage.php", 
          method: "POST",
          data: { petId: selectedOption },
          success: function(response) {
            imagePreview.src = "data:image/jpeg;base64," + response; // Set the src attribute of the image
          },
          error: function() {
            imagePreview.src = ""; // Clear the image preview
          }
        });

      } else {
        statusInput.disabled = true;
        fileInput.disabled = true;
        uploadButton.disabled = true;
        statusInput.value = "";
        imagePreview.src = ""; // Clear the image preview
      }
    }

    function setPreviewImage() {
      var fileInput = document.getElementById("imageFileInput");
      var imagePreview = document.getElementById("imagePreview");

      var file = fileInput.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        imagePreview.src = e.target.result;
      };

      reader.readAsDataURL(file);
    }
  </script>
</head>
<body>
  <div class="navbar">
    <nav>
      <img src="petpal.png">
      <ul>
        <li><a href="StaffMain.php">Home</a></li>
        <li><a href="viewappointment.php">Appointment</a></li>
        <li><a href="updatestatus.php">Update Status</a></li>
        <li><a href="uploadtest.php">Update Pet Status</a></li>
      </ul>
      <a href="staffprofile.php"><i class="fa-solid fa-user"></i></a>  
    </nav>
      <div class="container">
        <div class="content">
          <h1>Upload Pet Status</h1>
  <form action="" method="post" enctype="multipart/form-data">
    Pet ID:
    <select id="selectpetid" name="PetID" onchange="handleSelectionChange()">
      <option value="none">-Please select Pet ID-</option>
      <?php
        $conn = mysqli_connect("localhost", "Group6", "Group6", "Group6");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT PetID FROM petprofile";//加 customer condition
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $petId = $row["PetID"];
                echo "<option value='$petId'>$petId</option>";
            }
        } else {
            echo "No pet IDs found.";
        }

        $conn->close();
      ?>
    </select>

    <br>Text message:<input type="text" name="petstatus" id="statusinput" value="<?php if(isset($petStatus)){echo $petStatus;} ?>" required disabled><!-- edit input to label-->

    <br>Image:<input type="file" name="imageFile" accept="image/*" id="imageFileInput" disabled><!-- remove this -->

    <br><input type="submit" value="Upload" id="uploadButton" disabled>
    <br><img id="imagePreview" height="100" width="100" />
  </form>
   </div>
      </div>
    </div>
</body>
</html>