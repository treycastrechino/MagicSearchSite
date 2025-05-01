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
function initalizeCurrentPage(){

    if(isset($_SESSION['currentPage'])){


    }
    else{

        $_SESSION['currentPage'] = 1;
    }
}

function initalizeTotalPages(){

    if(isset($_SESSION['totalPageCount'])){


    }
    else{

        $_SESSION['totalPageCount'] = 1;
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

function createImageArray($cardJson){

    $numOfCards = count($cardJson['cards']);
    for($i = 0; $i < $numOfCards; $i++){

        if(array_key_exists('imageUrl',$cardJson['cards'][$i])){

            $imageUrl = $cardJson['cards'][$i]['imageUrl'];

            $htmlImageStatement =  '
            <div class="imageDiv" id="imageDiv">

                <img src="'. $imageUrl .'" style="width:250px;height:350px;"> 

            </div>
            ';
            
            echo $htmlImageStatement;
        }
        else{

            $htmlStatement = '<p> No image found for' . $cardJson['cards'][$i]['name']. ' from ' . $cardJson['cards'][$i]['setName'] . ' set</p>';
            
            echo $htmlStatement;
            echo '<br>';
            $htmlImageStatement =  '
            <div class="imageDiv" id="imageDiv">

                <img src="Images/cardNotFound.jpg" style="width:250px;height:350px;"> 

            </div>
            ';
            echo $htmlImageStatement;
        }
    }
    
}

function createPageNumberLinks($currentPage, $numOfPages){

echo '<div class="changePageLinks" id="changePageLinks">';
    if($currentPage != 1){
        echo '
        
            <form action="multiCardDisplayPage.php" method="post">
                <input type="hidden" name="previousPage" value="previousPage"/>
                <a href="#" onclick="this.parentNode.submit()">&lt;</a>
            </form>';

            echo '
        
            <form action="multiCardDisplayPage.php" method="post">
                <input type="hidden" name="firstPage" value="firstPage"/>
                <a href="#" onclick="this.parentNode.submit()">1...</a>
            </form>';


    }
    

    for($i = 1; $i < $numOfPages; $i ++){

        if($i != 1 && $i != $numOfPages){
            echo '<a href="http://localhost/MagicSearchSite/multiCardDisplayPage.php">'. $currentPage .'</a>';
        break;
        }

    }

    if($currentPage != $numOfPages){


        echo '
        
        <form action="multiCardDisplayPage.php" method="post">
            <input type="hidden" name="lastPage" value="lastPage"/>
            <a href="#" onclick="this.parentNode.submit()">...'. $numOfPages . '</a>
        </form>';

        echo '
        
        <form action="multiCardDisplayPage.php" method="post">
            <input type="hidden" name="nextPage" value="nextPage"/>
            <a href="#" onclick="this.parentNode.submit()">&gt;</a>
        </form>';
        
    }

    echo '</div>';
    
}

?>