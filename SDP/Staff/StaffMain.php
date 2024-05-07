<?php
include "src/session.php";
?>

<!DOCTYPE html>

<html>
    <head>
        <title>PetCare System</title>
        <link rel="stylesheet" href="staffmain.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://kit.fontawesome.com/680d8c5a2a.js" crossorigin="anonymous"></script>
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
        
            <div class="content">
                <h1>Welcome to PetPal</h1>
                <h3>We deliver love and care to your pet family.</h3>
                <h3>We have everything you need for your pet.</h3>
                <div>
                    <button type="button"><span></span>LEARN MORE</button>
                </div>
            </div>
        </div>   
        
        <section class="about">
            <div class="main">
                <img src="dog.png">
                <div class="abouttext">
                    <h2>About US</h2>
                    <p>PetPal is a pet care management system that provides high-quality 
                        pet care services to pet owners. We are a team of dedicated pet care 
                        professionals who understand the importance of providing excellent care to pets. 
                        Our services include daily walks, feeding and medication administration, overnight pet sitting, 
                        and grooming services. We are fully insured and bonded, 
                        and our staff is trained in pet first aid and CPR. 
                        At PetPal, we are committed to the well-being of your pets and providing peace of mind to pet owners. 
                        Contact us today to learn more about our services.</p>
                </div>
            </div>
        </section>
        <section class="contact">
            <form onsubmit="snedEmail(); reset(); return false">
                <h3>Contact Us</h3>
                <input type="text" id="name" placeholder="Your Name" required>
                <input type="email" id="email" placeholder="Email id" required>
                <input type="text" id="phone" placeholder="Contact no." required>
                <input type="text" id="subject" placeholder="Subject." required>
                <textarea id="message" rows="4" placeholder="How can we help you"></textarea>
                <button type="submit">Submit</button>
            </form>
        </section>
        <section class="footer">
            <div class="social">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
            </div>
            <ul class="list">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Staff</a>
                </li>
                <li>
                    <a href="#">Appointment</a>
                </li>
                <li>
                    <a href="#">Report</a>
                </li>
            </ul>
        </section>
        <script>
            let subMenu = document.getElementById("subMenu");
            function toggleMenu(){
                subMenu.classList.toggle("openMenu");
            }
        </script>
    </body>
</html>