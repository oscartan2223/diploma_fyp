<?php
include "src/session.php";?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="addpet.css">

</head>
<body>

<div class="container">

    <form action="addbackend.php" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Add Your Pet</h3>

                <div class="inputBox">
                    <span>Pet Name :</span>
                    <input type="text" name = "petName" placeholder="Fifi">
                </div>
                <div class="inputBox">
                    <span>Pet Type :</span>
                    <input type="text" name = "petType" placeholder="Husky">
                </div>
                <div class="inputBox">
                    <span>Pet Gender :</span>
                    <input type="text" name = "petGender" placeholder="Male/Female">
                </div>
                <div class="inputBox">
                    <span>Pet Age :</span>
                    <input type="text" name = "petAge">
                </div>
            </div>
        </div>
    
        <input type="submit" value="Add" class="submit-btn">

    </form>

</div>    
    
</body>
</html>