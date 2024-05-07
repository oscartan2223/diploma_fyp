<?php
    $cusemail = "xxx@gmail.com";
?>

<!DOCTYPE html>
<html lang ="en" dir = "ltr">
    <head>
        <meta charset="utf-8">
        <title>Send Email</title>
    </head>
    <body>
        <form class="" action="send.php" method="post">
            Email <input type="email" name="email" value="qianbot03@gmail.com" ></label><br>
            <!-- Get the email from database using session id -->
            Subject <input type="text" name="subject" value=""> <br>
            Message <input type="text" name="message" value=""> <br>
            <button type="submit" name="send">Send</button>
        </form>
    </body>
</html>