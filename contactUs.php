
<?php

include("siteHeader.php");
include("contactUsLogic.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/MagicSearchSite/contactUs.css">
    </head>

    <body>
        <h2>We'd love to hear from you!</h2>
        <p>Is there something we can improve?</p>
        <p>Want to tell us how you enjoy the site</p>
        <p>Leave us a message below with your email and we will get back to you!</p>
        <br>
        
        <div class=messageBox>

            <form action="contactUs.php" method="post">
                <label for="email">Email:</label>
                <input class="email" type="text" name="email" required> <br>
                <label for="message">Message:</label>
                <input class="message" type="text" name="message" required> <br>
                <button class="sendMessage" type="submit" name="sendMessage" value="sendMessage">Send Message</button>
            </form>

        </div>

    </body>
    
</html>

<?php
    include("siteFooter.php");

?>