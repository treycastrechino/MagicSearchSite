<?php

function initializeDisplayRandCard(){

    if (isset($_SESSION['showRandCard'])){


    }
    else{
    
        $_SESSION['showRandCard'] = false;
    }
}


function updateDisplayString($displayState){

    if($displayState == true){

        return 'display:';
    }
    else{

        return 'display: none';
    }

}













?>