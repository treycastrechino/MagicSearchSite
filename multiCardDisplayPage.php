<?php

include("siteHeader.php");
include("multiCardDisplayPageLogic.php");


initializeSearchConditionColor('u');
initializeSearchConditionColor('g');
initializeSearchConditionColor('r');
initializeSearchConditionColor('b');
initializeSearchConditionColor('w');
initializeSearchConditionName();
initializeSearchConditionFormat();
initializeSearchConditionCardType();
initializeSearchConditionRarity();
initializeSearchConditionSet();
initializeSearchConditionCmc();
initializeSearchConditionSubtype();
initializeSearchConditionPower();
initializeSearchConditionToughness();
initializeSearchConditionText();
initializeCurrentPage();
initializeTotalPages();

$_SESSION['cardId'] = null;

$cardsPerPage = 20;
$searchConditions = buildSearchConditions();
$totalCardCount = getTotalCardCountFromSearchConditions($searchConditions);
$totalPageCount = determinePageCountFromTotalCardCount($totalCardCount,$cardsPerPage);
$_SESSION['totalPageCount'] = $totalPageCount;
$currentPage = $_SESSION['currentPage'];
createPageNumberLinks($currentPage, $totalPageCount);
echo '<br>';
$cardJsonResults = returnCardJson($searchConditions,$currentPage);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/MagicSearchSite/multiCardDisplayPage.css">
    <script src="http://localhost/MagicSearchSite/siteJavaScript.js"></script>
</head>
<body>
    <div>
    <?php 
    
    createImageArray($cardJsonResults);
    
    ?>
    </div>
</body>
</html>


<?php


createPageNumberLinks($currentPage, $totalPageCount);
include("siteFooter.php");

?>