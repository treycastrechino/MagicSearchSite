<?php

include("cardSearchFunctions.php");

function initializeSearchConditionColor($color){

    if(isset($_SESSION[$color])){

        // the color was chosen when the page was loaded
    }
    else{

        $_SESSION[$color] = false;
    }

}

function initalizeSearchConditionName(){

    if(isset($_SESSION['cardSearchName'])){

        // the name was chosen when the page loaded
    }
    else{

        $_SESSION['cardSearchName'] = '';
    }
}
function initalizeSearchConditionFormat(){

    if(isset($_SESSION['cardSearchFormat'])){

        // the format was chosen when the page loaded
    }
    else{

        $_SESSION['cardSearchFormat'] = '';
    }
}
function initalizeSearchConditionCardType(){

    if(isset($_SESSION['cardSearchCardType'])){

        // the card type was chosen when the page loaded
    }
    else{

        $_SESSION['cardSearchCardType'] = '';
    }
}


function createColorSearchCondition(){

    $colorCount = 0;
    $colorSearch = '';
    if($_SESSION['u']){

        if($colorCount > 0 ){

            $colorSearch = $colorSearch . ',u';
        }
        else{

            $colorSearch = $colorSearch . '&colors=u';
            $colorCount ++;
        }
    }

    if($_SESSION['g']){

        if($colorCount > 0 ){

            $colorSearch = $colorSearch . ',g';
        }
        else{

            $colorSearch = $colorSearch . '&colors=g';
            $colorCount ++;
        }
    }

    if($_SESSION['r']){

        if($colorCount > 0 ){

            $colorSearch = $colorSearch . ',r';
        }
        else{

            $colorSearch = $colorSearch . '&colors=r';
            $colorCount ++;
        }
    }

    if($_SESSION['w']){

        if($colorCount > 0 ){

            $colorSearch = $colorSearch . ',w';
        }
        else{

            $colorSearch = $colorSearch . '&colors=w';
            $colorCount ++;
        }
    }

    if($_SESSION['b']){

        if($colorCount > 0 ){

            $colorSearch = $colorSearch . ',b';
        }
        else{

            $colorSearch = $colorSearch . '&colors=b';
            $colorCount ++;
        }
    }

    return $colorSearch;
}

function buildSearchConditions(){

    // the dropdown menu will always have something selected so this makes the condition build process easier because it is always more than one

    $searchConditions = '';
    $searchConditions = addSearchCondition($searchConditions, 'gameFormat', $_SESSION['cardSearchFormat']);
    $searchConditions = addSearchCondition($searchConditions, 'types', $_SESSION['cardSearchCardType']);
    if($_SESSION['cardSearchName'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'name', $_SESSION['cardSearchName']);
    }
    
    $colorSearch = createColorSearchCondition();
    $searchConditions = $searchConditions . $colorSearch;

    return $searchConditions;
}

function createImageArray($urlArray){

    $urlCount = count($urlArray);
    for ($i = 0; $i < $urlCount; $i ++){

        // statement for eventual on click function
        // $htmlStatement = '<img src="' . $urlArray[$i] . '" onclick="window.open(this.src)">';
        $htmlStatement = '<img src="' . $urlArray[$i] . '">';
        echo $htmlStatement;
        echo '<br>';
    }
    
}

?>