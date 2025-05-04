<?php

include("singleCardDisplayPageFunctions.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){


    openConnection();
    
    addCardToDeck($connectionVariable,$_SESSION['userId'],$_POST['deckList'],$_SESSION['cardId']);
    $_SESSION['cardAddedMessage'] = 'Card added successfully';
    header("Location: http://localhost/MagicSearchSite/singleCardDisplayPage.php");
    exit();
}


?>