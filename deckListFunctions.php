<?php



function showDeckName(){

    $html = '<h2>' . $_SESSION['currentDeck'][0];
    $html = $html . '</h2>';
    echo $html;
    echo '<br>';
}



?>