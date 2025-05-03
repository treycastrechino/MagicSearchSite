<?php


include("advanceSearchFunctions.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){



    if(isset($_POST['color'])){

        foreach($_POST['color'] as $color){

            $_SESSION[$color] = true;

        }
    }
    else{

        
    }

    $_SESSION['cardSearchFormat'] = $_POST['gameFormat'];
    $_SESSION['cardSearchCardType'] = $_POST['cardType'];
    $_SESSION['cardSearchName'] = $_POST['cardName'];
    $_SESSION['cardSearchRarity'] = $_POST['rarity'];
    $_SESSION['cardSearchCmc'] = $_POST['cmc'];
    $_SESSION['cardSearchSet'] = $_POST['set'];
    $_SESSION['cardSearchSubtype'] = $_POST['subtype'];
    $_SESSION['cardSearchPower'] = $_POST['power'];
    $_SESSION['cardSearchToughness'] = $_POST['toughness'];
    $_SESSION['cardSearchText'] = $_POST['rulesText'];


    header("Location: http://localhost/MagicSearchSite/multiCardDisplayPage.php");
    exit();


}








?>