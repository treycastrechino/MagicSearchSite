<?php

include("siteHeader.php");
include("multiCardDisplayPageFunctions.php");

initalizeSearchConditionName();
initializeSearchConditionColor('u');
initializeSearchConditionColor('g');
initializeSearchConditionColor('r');
initializeSearchConditionColor('b');
initializeSearchConditionColor('w');
initalizeSearchConditionFormat();
initalizeSearchConditionCardType();


$searchConditions = buildSearchConditions();
$cardJsonResults = returnCardJson($searchConditions,1);
$imageUrlArray = returnImageUrlArrayFromSearch($cardJsonResults);

session_unset();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php 
    
    createImageArray($imageUrlArray);
    if(count($imageUrlArray) < 1){

        echo '<p> No results found </p>';
    }
    
    ?>
    </div>
</body>
</html>




<?php



include("siteFooter.php");

?>