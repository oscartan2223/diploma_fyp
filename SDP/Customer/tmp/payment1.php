<!DOCTYPE html>
<html>
<head>
    <title>PetPal -  Payment</title>
    <link rel="stylesheet" type="text/css" href="payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>

<div class="navbar">
    <nav>
        <img src="petpal.png">
        <ul>
            <li><a href="CusMain.php">Home</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Medical Services</a></li>
            <li><a href="">Appointment</a></li>
        </ul>
        <a href="#" class="btn">Login</a>
    </nav>
</div>

<form action="test.php" method="post">
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
            </ul>
        </div>
        <div class="form_wrap">
            <div class="form_1 data_info">
                <h2>Select Payment Method</h2>
                    <div class = "form_container">
                        <div class="input_wrap">
                            <label for="card_payment">Card Payment</label>
                            <button type="button" class="card_payment" name="card_payment" value = "Card Payment" onclick="window.location.href='http://localhost/Customer/cardpayment.php'">Card Payment</button>
                        </div>
                        <div class="input_wrap">
                            <label for="online_banking">Online Banking</label>
                                <button type="button"class="online_banking" name="online_banking" value = "onlline banking" onclick="window.location.href='http://localhost/Customer/onlinebanking.php'">Online Banking</button>
                        </div>
                        <div class="input_wrap">
                            <label for="e-wallet">E-wallet Payment</label>
                                <button type="button"class="e-wallet" name="e-wallet" value = "e-wallet" onclick="window.location.href='http://localhost/Customer/ewallet.php'">E-wallet Payment</button>
                        </div>
                    </div>
            </div>        
        </div>
        <div class="btns_wrap">
            <div class="common_btns form_2_btns" style="display: none;">
                <button type="button" class="btn_back ">Back
                    <span class="icon">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </span>
                </button>
                <button type="submit" class="btn_done" name="done">Done
                    <span class="icon"></span>
                </button>
            </div>
        </div>
    </div>
</form>

<div class="modal_wrapper">
    <div class="shadow"></div>
    <div class="success_wrap">
        <span class="modal_icon">
            <ion-icon name="checkmark-outline"></ion-icon>
        </span>
        <p>You have successfully booked the appointment.</p>
    </div>
</div>


<script type="text/javascript" src="payment.js"></script>

</body>
</html>