<?php
    $TransactionID = $_GET['TransactionID'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="onlinebanking.css">

</head>
<body>

<div class="container">

    <form action="processpayment.php?TransactionID=<?php echo $TransactionID; ?>" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">Online Banking</h3>

                <div class="input_wrap">
                            <label for="bankname">Bank Name</label>
                            <select>
                                <option value="Maybank">Maybank</option>
                                <option value="CIMB Bank">CIMB Bank</option>
                                <option value="AmBank">AmBank</option>
                                <option value="Public Bank">Public Bank</option>
                                <option value="RHB Bank">RHB Bank</option>
                                <option value="Hong Leong Bank">Hong Leong Bank</option>
                            </select>
                </div>
                <div class="inputBox">
                    <span>ReceiptID: </span>
                    <input type="receiptID" placeholder="M0000001"required>
                </div>
               
                </div>

            </div>
            <input type="hidden" id="custId" name="paymethod" value="Online Banking">
        <input type="submit" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    
</body>
</html>