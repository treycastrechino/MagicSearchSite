
<?php

include("siteHeader.php");
include("decksLogic.php");

$_SESSION['userDecks'] = array(

    array(
        
        0 => 'Deck 1',
        1 => '660317',
        2 => '660317'
    
    ),

    array (

        0 => 'Deck 2',
        1 => '660317',
        2 => '660317'
    )
    );

    $databaseStore = json_encode($_SESSION['userDecks']);
    echo $databaseStore;
    $returnedValue = json_decode($databaseStore);
    var_dump($returnedValue);
    $_SESSION['userDecks'] = $returnedValue;
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