
<?php

include("siteHeader.php");
include("singleCardDisplayPageFunctions.php");
include("cardSearchFunctions.php");


$id = getCardID();
$cardData = returnCardFromMultiverseId($id);
$imageUrl = $cardData['cards'][0]['imageUrl'];

displayCardInformation($cardData);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/MagicSearchSite/singleCardDisplayPage.css.">
    </head>

    <body>

        <div>

        <img src="<?php echo $imageUrl; ?>" style="width:250px;height:350px;">

        </div>

        <div class="cardInformation">


        </div>


    </body>
    
</html>

<?php
    include("siteFooter.php");

?>