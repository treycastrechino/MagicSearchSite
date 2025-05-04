<?php

function initializeDisplayRandCard(){

    if (isset($_SESSION['showRandCard'])){


    }
    else{
    
        $_SESSION['showRandCard'] = false;
    }
}

function initializeRandomCardJson(){

    if (isset($_SESSION['randomCardJson'])){


    }
    else{
    
        $_SESSION['randomCardJson'] = null;
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

function initializeUserId(){

    if (isset($_SESSION['userId'])){


    }
    else{
    
        $_SESSION['userId'] = '';
    }

}












?>