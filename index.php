<?php

include("siteHeader.php");
include("cardSearchFunctions.php");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="allPage.css">
    </head>

    <body>
       

        <?php 
        
        $searchConditions = addInitialSearchCondition('set','MIR');
        $searchConditions = addAdditionalSearchConditions($searchConditions,'colors',"b,u");
        $testCards = returnCardJson($searchConditions);
        showAllCardsFromSearch($testCards);

        ?>

        <p>This is the home page</p>

        
    </body>
    
</html>


<?php

 include("siteFooter.php");
?>