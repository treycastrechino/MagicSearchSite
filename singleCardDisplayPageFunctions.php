<?php

function getCardID(){

    $full_link = $_SERVER['REQUEST_URI'];
    $linkArray = explode('=',$full_link);
    $id = $linkArray['1'];
    return $id;
}

function displayCardInformation($cardJson){

if(isset($cardJson['cards']['0']['name'])){

    $name = $cardJson['cards']['0']['name'];

}
else{

    $name = '';
}

if(isset($cardJson['cards']['0']['manaCost'])){

    $manaCost = $cardJson['cards']['0']['manaCost'];

}
else{

    $manaCost = '';
}

if(isset($cardJson['cards']['0']['cmc'])){

    $cmc = $cardJson['cards']['0']['cmc'];

}
else{

    $cmc = '';
}

if(isset($cardJson['cards']['0']['type'])){

    $type = $cardJson['cards']['0']['type'];

}
else{

    $type = '';
}

if(isset($cardJson['cards']['0']['rarity'])){

    $rarity = $cardJson['cards']['0']['rarity'];

}
else{

    $rarity = '';
}

if(isset($cardJson['cards']['0']['setName'])){

    $setName = $cardJson['cards']['0']['setName'];

}
else{

    $setName = '';
}

if(isset($cardJson['cards']['0']['text'])){

    $text = $cardJson['cards']['0']['text'];

}
else{

    $text = '';
}

if(isset($cardJson['cards']['0']['artist'])){

    $artist = $cardJson['cards']['0']['artist'];

}
else{

    $artist = '';
}

if(isset($cardJson['cards']['0']['number'])){

    $number = $cardJson['cards']['0']['number'];

}
else{

    $number = '';
}

if(isset($cardJson['cards']['0']['power'])){

    $power = $cardJson['cards']['0']['power'];

}
else{

    $power = '';
}

if(isset($cardJson['cards']['0']['toughness'])){

    $toughness = $cardJson['cards']['0']['toughness'];

}
else{

    $toughness = '';
}

if(isset($cardJson['cards']['0']['rulings'])){

    $rulings = $cardJson['cards']['0']['rulings'];

}
else{

    $rulings = $array = array(
        0 => array(
            'date' => '',
            'text' => ''
        ),
        1 => array(
            'date' => '',
            'text' => ''
        ),
    );

}

if(isset($cardJson['cards']['0']['legalities'])){

    $legalities = $cardJson['cards']['0']['legalities'];

}
else{

    $legalities = $array = array(
        0 => array(
            'format' => '',
            'legality' => ''
        ),
        1 => array(
            'format' => '',
            'legality' => ''
        ),
    );
}

    echo $name . '<br>';
    echo $manaCost . '<br>';
    echo $cmc . '<br>';
    echo $type . '<br>';
    echo $rarity . '<br>';
    echo $setName . '<br>';
    echo $text . '<br>';
    echo $artist . '<br>';
    echo $number . '<br>';
    echo $power . '<br>';
    echo $toughness . '<br>';
    showRulings($rulings);
    showLegality($legalities);


}

function showRulings($rulingsArray){

    $rulingsCount = count($rulingsArray);

    for($i = 0; $i < $rulingsCount; $i ++){

        echo $rulingsArray[$i]['date'] . '<br>';
        echo $rulingsArray[$i]['text'] . '<br>';

    }
}

// remember that the results only show formats that the card is legal in not banned formats
function showLegality($legalityArray){

    $legalityCount = count($legalityArray);

    for($i = 0; $i < $legalityCount; $i ++){

        echo $legalityArray[$i]['format'] . ': ';
        echo $legalityArray[$i]['legality'] . '<br>';

    }
}

?>