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
    $html = '<p class="infoText">Card name: ' . $name;
    $html = $html . '</p>';
    echo $html;

}
else{

    $name = '';
}

if(isset($cardJson['cards']['0']['manaCost'])){

    $manaCost = $cardJson['cards']['0']['manaCost'];
    $html = '<p class="infoText">Mana Cost: ' . $manaCost;
    $html = $html . '</p>';
    echo $html;
}
else{

    $manaCost = '';
}

if(isset($cardJson['cards']['0']['cmc'])){

    $cmc = $cardJson['cards']['0']['cmc'];
    $html = '<p class="infoText">CMC: ' . $cmc;
    $html = $html . '</p>';
    echo $html;
}
else{

    $cmc = '';
}

if(isset($cardJson['cards']['0']['type'])){

    $type = $cardJson['cards']['0']['type'];
    $html = '<p class="infoText">Card type: ' . $type;
    $html = $html . '</p>';
    echo $html;
}
else{

    $type = '';
}

if(isset($cardJson['cards']['0']['rarity'])){

    $rarity = $cardJson['cards']['0']['rarity'];
    $html = '<p class="infoText">Rarity: ' . $rarity;
    $html = $html . '</p>';
    echo $html;
}
else{

    $rarity = '';
}

if(isset($cardJson['cards']['0']['setName'])){

    $setName = $cardJson['cards']['0']['setName'];
    $html = '<p class="infoText">Set name: ' . $setName;
    $html = $html . '</p>';
    echo $html;
}
else{

    $setName = '';
}

if(isset($cardJson['cards']['0']['text'])){

    $text = $cardJson['cards']['0']['text'];
    $html = '<p class="infoText">Card text: ' . $text;
    $html = $html . '</p>';
    echo $html;
}
else{

    $text = '';
}

if(isset($cardJson['cards']['0']['artist'])){

    $artist = $cardJson['cards']['0']['artist'];
    $html = '<p class="infoText">Artist: ' . $artist;
    $html = $html . '</p>';
    echo $html;
}
else{

    $artist = '';
}

if(isset($cardJson['cards']['0']['number'])){

    $number = $cardJson['cards']['0']['number'];
    $html = '<p class="infoText">Card number: ' . $number;
    $html = $html . '</p>';
    echo $html;
}
else{

    $number = '';
}

if(isset($cardJson['cards']['0']['power'])){

    $power = $cardJson['cards']['0']['power'];
    $html = '<p class="infoText">Power: ' . $power;
    $html = $html . '</p>';
    echo $html;
}
else{

    $power = '';
}

if(isset($cardJson['cards']['0']['toughness'])){

    $toughness = $cardJson['cards']['0']['toughness'];
    $html = '<p class="infoText">Toughness: ' . $toughness;
    $html = $html . '</p>';
    echo $html;
}
else{

    $toughness = '';
}





}

function showRulings($cardJson){

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

    $rulingsCount = count($rulings);

    for($i = 0; $i < $rulingsCount; $i ++){

        $date = $rulings[$i]['date'];
        $htmlDate = '<p>Date: ' . $date;
        $htmlDate = $htmlDate . '</p>';
        echo $htmlDate;

        $text = $rulings[$i]['text'];
        $htmlText = '<p>' . $text;
        $htmlText = $htmlText . '</p>';
        echo $htmlText;

    }
}

// remember that the results only show formats that the card is legal in not banned formats
function showLegality($cardJson){

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

    $legalityCount = count($legalities);

    for($i = 0; $i < $legalityCount; $i ++){

        if($i == $legalityCount-1){

            $format = $legalities[$i]['format'] ;

        }
        else{

            $format = $legalities[$i]['format'] . ', ';
        }
        

        $html = '<p class="legality">' . $format;
        $html = $html . '</p>';
        echo $html;

    }
}

?>