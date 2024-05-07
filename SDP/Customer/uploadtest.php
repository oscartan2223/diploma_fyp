<?php
include "src/session.php";
include "src/conn.php"; // Include the connection file

// Get the customer ID from the session
$customerID = $_SESSION['id'];

$query = "SELECT CusName FROM customer WHERE CustomerID = $customerID";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the customer name
    $row = mysqli_fetch_assoc($result);
    $customerName = $row['CusName'];
} else {
    // Default name if no customer found
    $customerName = "Error";
}
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
            echo "Pet information updated successfully.";
        } else {
            echo "Error updating pet information: " . mysqli_error($conn);
        }
    } else {
        // No image file uploaded
        $updateSql = "UPDATE petprofile SET PetStatus = '$SavePetStatus' WHERE PetID = '$SavePetID'";

        if (mysqli_query($conn, $updateSql)) {
            echo "Pet information updated successfully.";
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
    <title>PetPal - Owner Profile</title>
    <link rel="stylesheet" type="text/css" href="uploadtest.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
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
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span>PetPal</span></h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="ownerProfile.php" ><span class="fa-solid fa-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="viewpet.php"><span class="fa-solid fa-paw"></span>
                    <span>Pet</span></a>
                </li>
                <li>
                    <a href="viewAppointment.php"><span class="fa-solid fa-calendar-check"></span>
                    <span>Appointment</span></a>
                </li>
                <li>
                    <a href="uploadtest.php" class="active"><span class="fa-solid fa-dog"></span>
                    <span>Pet Status</span></a>
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
                <li><a href="CusMain.php">Home</a></li>
                <li><a href="service.html">Services</a></li>
                <li><a href="medical.html">Medical Services</a></li>
                <li><a href="appoinment.html">Appointment</a></li>
                </ul>
            </nav>
            <div class="user-wrapper">
            <div>
                <h4><?php echo $customerName; ?></h4>
                <small>Pet Owner</small>
                </div>
            </div>
        </header>
            <div class="container">
                <div class="profile">
                    <div class="content">
                        <h1>Receive Pet Status</h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            Pet ID:
                            <select id="selectpetid" name="PetID" onchange="handleSelectionChange()">
                            <option value="none">-Please select Pet ID-</option>
                            <?php
                                $conn = mysqli_connect("localhost", "Group6", "Group6", "Group6");

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT PetID FROM petprofile WHERE CustomerID = $customerID";//add customer condition
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

                            <br>Text message:<input type="text" name="petstatus" id="statusinput" value="<?php if(isset($petStatus)){echo $petStatus;} ?>"  readonly>
                

                <br>Image:<input type="hidden" name="imageFile" accept="image/*" id="imageFileInput" disabled><!-- remove this -->

                <br><input type="hidden" value="Upload" id="uploadButton" disabled>
                            <br><img id="imagePreview" height="100" width="100" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>