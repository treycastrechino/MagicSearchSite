
<?php

    // The deck array format is that every deck is stored in a decks array
    // and every deck index 0 will be the name of the deck followed by multiverse IDs for the cards in the deck.
    include("siteHeader.php");
    include("decksLogic.php");



    openConnection();
    setUserDecks($connectionVariable,$_SESSION['userId']);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/MagicSearchSite/decks.css">
    </head>

    <body>
        
        <form action="decks.php" method="post">

        <button class="addDeckButton" type="submit" name="addDeck" value="addDeck">Add deck</button>

        <div class="deckDisplay">
        <?php displayAllDecks(); ?>
        </div>

        </form>




    </body>
    
</html>

<?php
    include("siteFooter.php");

?>