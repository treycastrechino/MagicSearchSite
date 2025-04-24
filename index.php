<?php
// This will be the main home page of the site.

require 'vendor/autoload.php';
use mtgsdk\Card;
use mtgsdk\QueryBuilder;
use mtgsdk\Set;
use mtgsdk\Subtype;
use mtgsdk\Supertype;
use mtgsdk\Type;


$myCard = card::find(4800);

var_dump($myCard);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
</body>
</html>