<?php
    $TransactionID = $_GET['TransactionID'];
    ?>

<!DOCTYPE html>

<head>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="ewallet.css">

</head>
<body>

<div class="container">

    <form action="processpayment.php?TransactionID=<?php echo $TransactionID; ?>" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">E-wallet</h3>

                <div class="photo">
                    <img src="tngbarcode.png">
                    
                </div>
                <input type="hidden" id="custId" name="paymethod" value="E-Wallet">     
        <input type="submit" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    
</body>
</html>