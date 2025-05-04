<?php

include("cardSearchFunctions.php");

function removeCardFromDeck($array, $elementToRemove) {

    for ($i = $elementToRemove; $i < count($array) - 1; $i++) {
        $array[$i] = $array[$i + 1];
    }
    unset($array[count($array) - 1]);

    return $array;
}

function setUserDecks($connectionVariable,$userId){

   if (checkIfDecksExist($connectionVariable,$userId)){

    $userDecks = $connectionVariable->query("SELECT decks FROM decks WHERE user_id = '$userId'");
    $userDecks = $userDecks->fetch_assoc();
    $decks = json_decode($userDecks['decks']);
    $_SESSION['userDecks'] = $decks;

   }
   else{

    $_SESSION['userDecks'] = array();
   }


}

function displayAllDecks(){

    if(count($_SESSION['userDecks']) > 0){

        for($i = 0; $i < count($_SESSION['userDecks']); $i ++){

            if(isset($_SESSION['userDecks'][$i][1])){

                echo '<div class="imageDiv">';
                $cardData = returnCardFromMultiverseId($_SESSION['userDecks'][$i][1]);
                $imageUrl = $cardData['cards'][0]['imageUrl'];
                $html = '<img src="' . $imageUrl;
                $html = $html . '" style="width:250px;height:350px;">';
                echo $html;
    
                echo '</div>';
            }
            else{
                echo '<div class="imageDiv">';
                $imageUrl = 'Images/cardNotFound.jpg';
                $html = '<img src="' . $imageUrl;
                $html = $html . '" style="width:250px;height:350px;">';
                echo $html;
    
                echo '</div>';

            }



            
            $deckName = $_SESSION['userDecks'][$i][0];
            echo '<div class="deckDiv">';
            $html = '<button type="submit" name="deckName"';
            $html = $html . 'value="';
            $html = $html . $deckName;
            $html = $html . '">';
            $html = $html . $deckName;
            $html = $html . '</button>';
            echo $html;
            echo '</div>';
            echo '<br>';
        }

    }

    else{

        echo '<p>No decks found</p>';
    }
}

function addDeckToDatabase($deck,$connectionVariable,$userId){

    if(checkIfDecksExist($connectionVariable,$userId)){

        
        $usersDecks = $connectionVariable->query("SELECT * FROM decks WHERE user_id = '$userId'");
        $userData = $usersDecks->fetch_assoc();
        $decks = json_decode($userData['decks']);
        array_push($decks,$deck);
        $decks = json_encode($decks);
        $insertDeckQuery = "UPDATE decks SET decks='$decks' WHERE user_id='$userId'";
        $connectionVariable->query($insertDeckQuery);

    }
    else{


        $decksArray = array();
        array_push($decksArray,$deck);
        $databaseStore = json_encode($decksArray);

        $insertDeckQuery = "INSERT INTO decks (user_id, decks)
        VALUES   ('$userId', '$databaseStore')";

        $connectionVariable->query($insertDeckQuery);
    }
}

function updateDecksInDatabase($connectionVariable,$decksArray,$userId){

        $decks = json_encode($decksArray);
        $insertDeckQuery = "UPDATE decks SET decks='$decks' WHERE user_id='$userId'";
        $connectionVariable->query($insertDeckQuery);
}


function addCardToDeck($connectionVariable,$userId,$deckName,$cardId){

    $usersDecks = $connectionVariable->query("SELECT * FROM decks WHERE user_id = '$userId'");
    $userData = $usersDecks->fetch_assoc();
    $decks = json_decode($userData['decks']);
    for($i = 0; $i < count($decks); $i ++){

        if($decks[$i][0] == $deckName){

            array_push($decks[$i],$cardId);
        }
    }
    $decks = json_encode($decks);
    $insertDeckQuery = "UPDATE decks SET decks='$decks' WHERE user_id='$userId'";
    $connectionVariable->query($insertDeckQuery);
    
}

function checkIfDecksExist($connectionVariable,$userId){

    $checkUserId = $connectionVariable->query("SELECT user_id FROM decks WHERE user_id = '$userId'");

    if($checkUserId->num_rows > 0){
    
        return true;
        
    }
    else{

        return false;

    }
}

function getDeckFromDecks($decks,$deckName){

    for($i = 0; $i < count($decks); $i ++){

        if($decks[$i][0] == $deckName){

            return $decks[$i];
        }
    }

}

function displayAllCardsInDeck($deck){

    for($i = 0; $i < count($deck); $i ++){

        if($i > 0){

            echo '<div>';
            $cardJson = returnCardFromMultiverseId($deck[$i]);
            showCardImage($cardJson,0);

            
            $html = '<button type="submit" name="removeCard';
            $html = $html . $i;
            $html = $html . '"value="';
            $html = $html . $i;
            $html = $html . '">';
            $html = $html . 'Remove Card';
            $html = $html . '</button>';
            echo $html;

            echo '<div>';
        }
    }
}


?>