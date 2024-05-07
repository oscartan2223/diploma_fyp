<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Username: Adpetpals0524@gmail.com
//Password: Adpetpals0524.


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'adpetpals0524@gmail.com';
    $mail->Password = 'kagisvswoedghsjl';
    $mail->SMTPSecure = 'ssl';
    $mail-> Port = 465;

    $mail->setFrom('adpetpals0524@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail -> isHTML(true);

    $mail-> Subject = $_POST["subject"];
    $mail-> Body = $_POST["message"];

    $mail-> send();

    echo
    "
    <script>
    alert('Sent Successfully');
    document.location.href = 'email.php';
    </script>
    ";
    header ("Location: http://localhost/Admin/notification.php");
}