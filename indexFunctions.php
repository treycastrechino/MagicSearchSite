<?php

function initializeDisplayRandCard(){

    if (isset($_SESSION['showRandCard'])){


    }
    else{
    
        $_SESSION['showRandCard'] = false;
    }
}

function initializeRandCardUrl(){

    if (isset($_SESSION['randCardUrl'])){


    }
    else{
    
        $_SESSION['randCardUrl'] = '';
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