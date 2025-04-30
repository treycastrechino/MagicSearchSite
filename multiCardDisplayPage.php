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
$cardJsonResults = returnCardJson($searchConditions);
showAllCardsFromSearch($cardJsonResults);

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
    
</body>
</html>




<?php



include("siteFooter.php");

?>