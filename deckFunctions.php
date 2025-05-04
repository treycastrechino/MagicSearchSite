<?php

include("cardSearchFunctions.php");

function removeArrayElement($array, $elementToRemove) {

    for ($i = $elementToRemove; $i < count($array) - 1; $i++) {
        $inArr[$i] = $array[$i + 1];
    }
    unset($array[count($array) - 1]);

    return $array;
}


function displayAllDecks(){

    if(count($_SESSION['userDecks']) > 0){

        for($i = 0; $i < count($_SESSION['userDecks']); $i ++){

            echo '<div class="imageDiv">';
            $cardData = returnCardFromMultiverseId($_SESSION['userDecks'][$i][1]);
            $imageUrl = $cardData['cards'][0]['imageUrl'];
            $html = '<img src="' . $imageUrl;
            $html = $html . '" style="width:250px;height:350px;">';
            echo $html;

            echo '</div>';

            
            $deckName = str_replace(' ','_',$_SESSION['userDecks'][$i][0]);
            echo '<div class="deckDiv">';
            $html = '<button type="submit" name="' . $deckName;
            $html = $html . '" value="';
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




?>