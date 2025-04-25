<?php
// This will be the main home page of the site.

require 'vendor/autoload.php';
use mtgsdk\Card;
use mtgsdk\QueryBuilder;
use mtgsdk\Set;
use mtgsdk\Subtype;
use mtgsdk\Supertype;
use mtgsdk\Type;

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
        <?php include("siteHeader.php")?>

        <p>This is the wishlist display page</p>

        <?php include("siteFooter.php")?>
    </body>
    
</html>