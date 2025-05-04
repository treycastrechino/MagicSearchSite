<?php

include("deckFunctions.php");



if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST['addDeck'])){


    }

    for($i = 0; $i < count($_SESSION['userDecks']); $i ++){
        
        $currentDeckName = str_replace(' ','_',$_SESSION['userDecks'][$i][0]);

        if(isset($_POST[$currentDeckName])){

            header("Location: http://localhost/MagicSearchSite/deckListDisplay.php");
            exit();
        }

    }




}


?>