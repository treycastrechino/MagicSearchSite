<?php

include("deckFunctions.php");



if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST['addDeck'])){

        $newDeck = array(

            0 => 'New Deck'
        );
        openConnection();
        addDeckToDatabase($newDeck,$connectionVariable, $_SESSION['userId']);
        header("Location: http://localhost/MagicSearchSite/decks.php");
        exit();
    }

    for($i = 0; $i < count($_SESSION['userDecks']); $i ++){

        if($_POST['deckName'] == $_SESSION['userDecks'][$i][0]){


            $_SESSION['deckIndex'] = $i;
            $_SESSION['currentDeck'] = $_SESSION['userDecks'][$i];
            
            header("Location: http://localhost/MagicSearchSite/deckListDisplay.php");
            exit();
        }

    }




}


?>