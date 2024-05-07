<?php
include "src/session.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>PetPal - Make Appointment</title>
    <link rel="stylesheet" type="text/css" href="appointment.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="navbar">
    <nav>
        <img src="petpal.png">
        <ul>
            <li><a href="CusMain.php">Home</a></li>
            <li><a href="service.html">Services</a></li>
            <li><a href="medical.html">Medical Services</a></li>
            <li><a href="appointment.php">Appointment</a></li>
        </ul>
        <a href="ownerProfile.php"><i class="fa-solid fa-user"></i></a>
    </nav>
</div>
<div class="image">
    <img src="appointment.jpg">
</div>

<form action="processappointment.php" method="post">

    <div class="wrapper">
        <div class="header">
            <ul>
                <li class="active form_1_progressbar">
                    <div>
                        <p>1</p>
                    </div>
                </li>
                <li class="form_2_progressbar">
                    <div>
                        <p>2</p>
                    </div>
                </li>
                <li class="form_3_progressbar">
                    <div>
                        <p>3</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="form_wrap">
            <div class="form_1 data_info">
                <h2>Select the Service</h2>
                
                    <div class = "form_container">
                        <div class="input_wrap">
                            <label for="service_type">Service Type</label>
                            <select name="Service_Type" id="service_type">
                                <option value="PetPal Service">PetPal Service</option>
                                <option value="Medical Service">Medical Service</option>
                            </select>
                        </div>
                        <div class="input_wrap" id="petpal_service">
                            <label for="petpal_service_select">PetPal Service</label>
                            <select name="PetPal_Service" id="petpal_service_select">
                                <option value="P1">Pet Grooming</option>
                                <option value="P2">Pet Boarding</option>
                                <option value="P3">Pet Transportation</option>
                                <option value="P4">Pet Training</option>
                                <option value="P5">Pet Surgery Aftercare</option>
                            </select>
                        </div>
                        <div class="input_wrap" id="medical_service" style="display: none;">
                            <label for="medical_service_select">Medical Service</label>
                            <select name="Medical_Service" id="medical_service_select">
                                <option value="M1">Wellness Examination</option>
                                <option value="M2">Vaccinations</option>
                                <option value="M3">Parasite Control</option>
                                <option value="M4">Dental Care</option>
                                <option value="M5">Microchipping</option>
                                <option value="M6">Surgery</option>
                            </select>
                        </div>
                    </div>
                
            </div>        
            <div class="form_2 data_info" style="display: none;">
                <h2>Select Appointment Date & Time</h2>
                
                    <div class = "form_container">
                        <div class="input_wrap">
                            <label for="appointment_date">Appointment Date</label>
                            <input type="date" name="Appointment_Date" id="appointment_date" required>
                        </div>
                        <script>
                            // Get the current date
                            var today = new Date().toISOString().split('T')[0];
                            
                            // Set the min attribute of the appointment date field to today
                            document.getElementById("appointment_date").setAttribute("min", today);
                        </script>
                        <div class="input_wrap">
                            <label for="appointment_time">Appointment Time</label>
                            <select name="Appointment_Time" id="appointment_time">
                                <option value="9:00 AM">9:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="1:00 PM">1:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="3:00 PM">3:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                                <option value="5:00 PM">5:00 PM</option>
                            </select>
                        </div>
                        <div class="input_wrap" id="checkout_date" style="display: none;">
                            <label for="checkout_date">Check-out Date</label>
                            <input type="date" name="Checkout_Date" id="checkout_date">
                        </div>
                        
                        <div class="input_wrap" id="checkout_time" style="display: none;">
                            <label for="checkout_time">Check-out Time</label>
                            <select name="Checkout_Time" id="checkout_time">
                                <option value="12:00 PM">12:00 PM</option>
                            </select>
                        </div>
                    </div>
                
            </div>
            <div class="form_3 data_info" style="display: none;">
                <h2>Enter Personal Info</h2>
                
                    <div class = "form_container">
                        <div class="input_wrap">
                            <label for="pet_name">Pet Name</label>
                            <input type="text" name="Pet_Name" id="pet_name" required>
                        </div>
                        <div class="input_wrap">
                            <label for="contact">Contact Number</label>
                            <input type="text" name="Contact_Number" id="contact" required>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="btns_wrap">
            <div class="common_btns form_1_btns">
                <button type="button" class="btn_next">Next
                    <span class="icon">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </span>
                </button>
            </div>
            <div class="common_btns form_2_btns" style="display: none;">
                <button type="button" class="btn_back ">Back
                    <span class="icon">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </span>
                </button>
                <button type="button" class="btn_next">Next
                    <span class="icon">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </span>
                </button>
            </div>
            <div class="common_btns form_3_btns" style="display: none;">
                <button type="button" class="btn_back ">Back
                    <span class="icon">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </span>
                </button>
                <button type="submit" name = "done" class="btn_done">Done
                    <span class="icon"></span>
                </button>
            </div>
        </div>
    </div> 

    
<form>

<section class="footer">
    <div class="social">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>
    </div>
    <ul class="list">
        <li>
            <a href="CusMain.php">Home</a>
        </li>
        <li>
            <a href="service.html">Services</a>
        </li>
        <li>
            <a href="medical.html">Medical Services</a>
        </li>
        <li>
            <a href="appointment.php">Appointment</a>
        </li>
    </ul>
</section>

<script type="text/javascript" src="appointment.js"></script>

</body>
</html>