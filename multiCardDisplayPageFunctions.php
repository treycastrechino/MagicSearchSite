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

function initializeSearchConditionName(){

    if(isset($_SESSION['cardSearchName'])){

        
    }
    else{

        $_SESSION['cardSearchName'] = '';
    }
}
function initializeSearchConditionFormat(){

    if(isset($_SESSION['cardSearchFormat'])){

        
    }
    else{

        $_SESSION['cardSearchFormat'] = '';
    }
}
function initializeSearchConditionCardType(){

    if(isset($_SESSION['cardSearchCardType'])){

       
    }
    else{

        $_SESSION['cardSearchCardType'] = '';
    }
}
function initializeSearchConditionRarity(){

    if(isset($_SESSION['cardSearchRarity'])){

        
    }
    else{

        $_SESSION['cardSearchRarity'] = '';
    }
}

function initializeSearchConditionSet(){

    if(isset($_SESSION['cardSearchSet'])){

        
    }
    else{

        $_SESSION['cardSearchSet'] = '';
    }
}

function initializeSearchConditionCmc(){

    if(isset($_SESSION['cardSearchCmc'])){

        
    }
    else{

        $_SESSION['cardSearchCmc'] = '';
    }
}

function initializeSearchConditionSubtype(){

    if(isset($_SESSION['cardSearchSubtype'])){

        
    }
    else{

        $_SESSION['cardSearchSubtype'] = '';
    }
}

function initializeSearchConditionPower(){

    if(isset($_SESSION['cardSearchPower'])){


    }
    else{

        $_SESSION['cardSearchPower'] = '';
    }
}

function initializeSearchConditionToughness(){

    if(isset($_SESSION['cardSearchToughness'])){

        
    }
    else{

        $_SESSION['cardSearchToughness'] = '';
    }
}

function initializeSearchConditionText(){

    if(isset($_SESSION['cardSearchText'])){

        
    }
    else{

        $_SESSION['cardSearchText'] = '';
    }
}
function initializeCurrentPage(){

    if(isset($_SESSION['currentPage'])){


    }
    else{

        $_SESSION['currentPage'] = 1;
    }
}

function initializeTotalPages(){

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
    if($_SESSION['cardSearchFormat'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'gameFormat', $_SESSION['cardSearchFormat']);
    }
    if($_SESSION['cardSearchCardType'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'types', $_SESSION['cardSearchCardType']);
    }
    
    if($_SESSION['cardSearchName'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'name', $_SESSION['cardSearchName']);
    }
    if($_SESSION['cardSearchRarity'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'rarity', $_SESSION['cardSearchRarity']);
    }
    if($_SESSION['cardSearchSet'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'set', $_SESSION['cardSearchSet']);
    }
    if($_SESSION['cardSearchCmc'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'cmc', $_SESSION['cardSearchCmc']);
    }
    if($_SESSION['cardSearchSubtype'] != ''){
        
        $searchConditions = addSearchCondition($searchConditions, 'subtypes', $_SESSION['cardSearchSubtype']);
    }
    if($_SESSION['cardSearchPower'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'power', $_SESSION['cardSearchPower']);
    }
    if($_SESSION['cardSearchToughness'] != ''){

        $searchConditions = addSearchCondition($searchConditions, 'toughness', $_SESSION['cardSearchToughness']);
    }
    if($_SESSION['cardSearchText'] != ''){

        $rulesTextFormatted = str_replace(' ', '_', $_SESSION['cardSearchText']);
        $searchConditions = addSearchCondition($searchConditions, 'text', $rulesTextFormatted);
    }

    
    
    $colorSearch = createColorSearchCondition();
    $searchConditions = $searchConditions . $colorSearch;

    return $searchConditions;
}

function createImageArray($cardJson){

    $numOfCards = count($cardJson['cards']);
    for($i = 0; $i < $numOfCards; $i++){

        if(array_key_exists('imageUrl',$cardJson['cards'][$i])){

            showCardImage($cardJson,$i);
            echo'<br>';

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