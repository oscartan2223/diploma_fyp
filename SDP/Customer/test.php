<?php


include "src/session.php";
include "src/conn.php";

if (isset($_POST["done"])) {
    $cardPayment = $_POST["card_payment"];
    $onlineBanking = $_POST["online_banking"];
    $eWallet = $_POST["e-wallet"];
    $status = "success";
    $ownerName = $_POST["owner_name"];

    if ($pcardPyament === "Card payment") {
        echo $cardPayment;
        echo $ownerName;
        echo $status;
    }
    if ($onlineBanking === "online banking") {
        echo $cardPayment;
        echo $ownerName;
        echo $status;
    }
    if ($eWallett === "e-wallet") {
        echo $cardPayment;
        echo $ownerName;
        echo $status;
    }
}
?>