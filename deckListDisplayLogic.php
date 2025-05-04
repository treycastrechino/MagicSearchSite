<?php

include("deckListFunctions.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

    for($i = 0; $i < count($_SESSION['currentDeck']); $i ++){

        $postVariable = 'removeCard' . $i;
        if(isset($_POST[$postVariable])){

            $_SESSION['currentDeck'] = removeCardFromDeck($_SESSION['currentDeck'],$i);
            $_SESSION['userDecks'][$_SESSION['deckIndex']] = $_SESSION['currentDeck'];
            openConnection();
            updateDecksInDatabase($connectionVariable,$_SESSION['userDecks'],$_SESSION['userId']);
            
            header("Location: http://localhost/MagicSearchSite/deckListDisplay.php");
            exit();
        }

    }

    if(isset($_POST['changeDeckName'])){

        $_SESSION['currentDeck'][0] = $_POST['deckName'];
        $_SESSION['userDecks'][$_SESSION['deckIndex']] = $_SESSION['currentDeck'];
        openConnection();
        updateDecksInDatabase($connectionVariable,$_SESSION['userDecks'],$_SESSION['userId']);
        
        header("Location: http://localhost/MagicSearchSite/deckListDisplay.php");
        exit();
    }

}

?>