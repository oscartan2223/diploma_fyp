<?php
include "src/session.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="addstaff.css">
</head>
<body>
<div class="container">
    <form action="addbackend.php" method="post">
        <div class="row">
            <div class="col">
                <h3 class="title">Add Staff</h3>
                <div class="inputBox">
                    <span>Staff Name :</span>
                    <input type="text" name = "staffName" placeholder="Bucky" required>
                </div>
                <div class="inputBox">
                    <span>Staff Email :</span>
                    <input type="email" name = "staffEmail" placeholder="example@gmail.com" required>
                </div>
                <div class="inputBox">
                    <span>Staff Password :</span>
                    <input type="password" name = "staffPassword" required>
                </div>
            </div>
        </div>  
        <input type="submit" value="Add" class="submit-btn">
    </form>
</div>      
</body>
</html>


