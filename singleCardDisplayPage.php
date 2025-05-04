
<?php

include("siteHeader.php");
include("deckFunctions.php");
include("singleCardDisplayPageLogic.php");



getCardID();
$id = $_SESSION['cardId'];
$cardData = returnCardFromMultiverseId($id);
$imageUrl = $cardData['cards'][0]['imageUrl'];
$displayString = updateDisplayString($_SESSION['isLoggedIn']);
initializeDeckArray();
initializeCardAddedMessage();
openConnection();
setUserDecks($connectionVariable,$_SESSION['userId']);
$userDeckArray = $_SESSION['userDecks'];




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

    <div class="saveDeckDiv" style="<?php echo $displayString?>">

    <form action="singleCardDisplayPage.php" method="post">

        <?php showDeckLists($userDeckArray); ?>
        <button type="submit" name="saveCardToDeck" value="saveCardToDeck">Save card to deck</button>

        </form>
    </div>

    <?php showCardAddMessage(); ?>

        <div class="imageAndCardInfo">

            <div class="imageContainer">

            <img src="<?php echo $imageUrl; ?>" style="width:250px;height:350px;">

            </div>

            <div class="cardInformation">

            <?php displayCardInformation($cardData); ?>
            
            </div>

        </div>

        <div class="cardLegality">
            <h2>Legal Sets</h2>
            <?php showLegality($cardData); ?>
            
        </div>


        <div class="cardRulings">
            <h2>Card Rulings</h2>
        <?php showRulings($cardData); ?>
        
        </div>


    </body>
    
</html>

<?php
    include("siteFooter.php");

?>