<?php

    include("siteHeader.php");
    include("deckFunctions.php");
    include("deckListDisplayLogic.php");

    openConnection();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/MagicSearchSite/deckList.css">
    </head>

        <?php  showDeckName(); ?>
    <body>
    <div class="nameChange">
        <form action="deckListDisplay.php" method="post">    
            <input  type="text" name="deckName" placeholder="Deck name">
            <button class="nameButton" type="submit" name="changeDeckName" value="changeDeckName">Change deck name</button>
        </form>
    </div>
        <form action="deckListDisplay.php" method="post">

        <div class="deckDisplay">
        <?php displayAllCardsInDeck($_SESSION['currentDeck']); ?>
        </div>


        </form>




    </body>
    
</html>

<?php
    include("siteFooter.php");

?>