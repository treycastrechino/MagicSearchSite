<?php

include("indexFunctions.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST['randomCard'])){

        $_SESSION['randomCardJson'] = returnRandomCardJson();
        $_SESSION['showRandCard'] = true;

        // go back to the home page but refresh the post variable so it doesn't act weird and ask for data resubmission
        header("Location: http://localhost/MagicSearchSite/index.php");
        exit();
    }


    
    if(isset($_POST['searchCard'])){

        
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

        header("Location: http://localhost/MagicSearchSite/multiCardDisplayPage.php");
        exit();
    }

}


?>