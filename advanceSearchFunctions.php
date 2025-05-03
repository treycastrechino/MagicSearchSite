<?php

include("cardSearchFunctions.php");


$setNames = array(

    'Core Set 2019' => 'M19',
    'Mirrodin' => 'MRD',
    'Dissention' => 'DIS',
    'Shards of Alara' => 'ALA'
);
$subtypes = array(

    'Bird' => 'bird',
    'Spirit' => 'spirit',
    'Zombie' => 'zombie',
    'Elf' => 'elf'
);


$subtypeValues = array_values($subtypes);
$subtypeKeys = array_keys($subtypes);
$setValues = array_values($setNames);
$setKeys = array_keys($setNames);

function createSetDropdown(){
global $setValues;
global $setKeys;


echo'<label for="set">Set:</label>';

echo '<select name="set" id="set">';
echo '<option value="">No Selection</option>';
for($i = 0;$i < count($setValues);$i++){

    $html = '<option value="' . $setValues[$i];
    $html = $html . '">';
    $html = $html . $setKeys[$i];
    $html = $html . '</option>';
    echo $html;
}
echo '</select>';
echo '<br>';
}

function createSubtypeDropdown(){

    global $subtypeValues;
    global $subtypeKeys;
    
    
    echo'<label for="subtype">Subtype:</label>';
    
    echo '<select name="subtype" id="subtype">';
    echo '<option value="">No Selection</option>';
    for($i = 0;$i < count($subtypeValues);$i++){
    
        $html = '<option value="' . $subtypeValues[$i];
        $html = $html . '">';
        $html = $html . $subtypeKeys[$i];
        $html = $html . '</option>';
        echo $html;
    }
    echo '</select>';
    echo '<br>';
    }


function createPowerDropdown(){

    $maxPower = 16;
    echo'<label for="power">Power:</label>';
    
    echo '<select name="power" id="power">';
    echo '<option value="">No Selection</option>';
        
    for($i = 0;$i < $maxPower;$i++){
    
        $html = '<option value="' . $i;
        $html = $html . '">';
        $html = $html . $i;
        $html = $html . '</option>';
        echo $html;
    }
    echo '</select>';
    echo '<br>';
}

function createToughnessDropdown(){

    $maxToughness = 16;
    echo'<label for="toughness">Toughness:</label>';
    
    echo '<select name="toughness" id="toughness">';
    echo '<option value="">No Selection</option>';
        
    for($i = 0;$i < $maxToughness;$i++){
    
        $html = '<option value="' . $i;
        $html = $html . '">';
        $html = $html . $i;
        $html = $html . '</option>';
        echo $html;
    }
    echo '</select>';
    echo '<br>';
}

function createCmcDropdown(){

    $maxCMC = 16;
    echo'<label for="cmc">CMC:</label>';
    
    echo '<select name="cmc" id="cmc">';
    echo '<option value="">No Selection</option>';
        
    for($i = 0;$i < $maxCMC;$i++){
    
        $html = '<option value="' . $i;
        $html = $html . '">';
        $html = $html . $i;
        $html = $html . '</option>';
        echo $html;
    }
    echo '</select>';
    echo '<br>';
}
?>