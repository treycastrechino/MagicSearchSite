<?php

include("siteHeader.php");
include("cardSearchFunctions.php");
include("indexLogic.php");


initializeDisplayRandCard();
initializeRandCardUrl();

$displayString = updateDisplayString($_SESSION['showRandCard']);
$randCardUrl = $_SESSION['randCardUrl'];

// username and logged in don't need to be removed with session unset
$username = $_SESSION['username'];
$isLoggedIn = $_SESSION['isLoggedIn'];
session_unset();
$_SESSION['username'] = $username;
$_SESSION['isLoggedIn'] = $isLoggedIn;

$searchConditions = '';
$testCards = returnCardJson($searchConditions,1);
echo '<div>';
showCardImage($testCards,0);
echo '</div>';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/MagicSearchSite/indexStyle.css">
        <script src="http://localhost/MagicSearchSite/siteJavaScript.js"></script>
        

    </head>

    <body>

    <div class="shitButton" id="shitButton">

            <button id="MyId" type="submit" name="randomCard" value="randomCard" onclick="onClick(this.id)">Shit button</button>  
             
        </div>
        
       <h1>
        You've arived at the mtg global search hub "Magic GSH"! <br>
        Start by searching for any card by name or even grabbing a random card from all of magic <br>
        If you need more detail then try the advanced search page! <br>
        Don't forget that users that log in get access to the deck builder where they can save decks <br>
        as well as the wishlist feature where you can save cards you like for later!
       </h1>

        
        <div class="randomCardSearch" id="randomCardSearch">
            <form action="index.php" method="post">
                <button type="submit" name="randomCard" value="randomCard">Random Card!</button>
            </form>
        </div>
        
        <div class="randomImageDiv" id="randomImageDiv" style="<?php echo $displayString?>">

        <img src='<?php echo $randCardUrl?>' style="width:250px;height:350px;" alt="Random Magic Card"> 

        </div>

        <div class="cardSearch" id="cardSearch">
            <form action="index.php" method="post">
                <input class="cardName" type="text" name="cardName" placeholder="cardName"> <br>
                <input class="colorCheckbox" type="checkbox" id="Red" name="color[]" value="r">
                    <label for="Red">Red</label>
                <input class="colorCheckbox" type="checkbox" id="Blue" name="color[]" value="u">
                    <label for="Blue">Blue</label>
                <input class="colorCheckbox" type="checkbox" id="Green" name="color[]" value="g">
                    <label for="Green">Green</label>
                <input class="colorCheckbox" type="checkbox" id="Black" name="color[]" value="b">
                    <label for="Black">Black</label>
                <input class="colorCheckbox" type="checkbox" id="White" name="color[]" value="w">
                    <label for="White">White</label>
                <br>
                <label class="dropDownLabel" for="gameFormat">Format:</label>
                <select name="gameFormat" id="gameFormat">
                    <option value="Standard">Standard</option>
                    <option value="Modern">Modern</option>
                    <option value="Commander">Commander</option>
                </select>
                <br>
                <label class="dropDownLabel" for="cardType">Card Type:</label>
                <select name="cardType" id="cardType">
                    <option value="Creature">Creature</option>
                    <option value="Land">Land</option>
                    <option value="Instant">Instant</option>
                    <option value="Sorcery">Sorcery</option>
                    <option value="Enchantment">Enchantment</option>
                    <option value="Planeswalker">Planeswalker</option>
                </select>
                <br>
                <button class="searchCardButton" type="submit" name="searchCard" value="searchCard">Search</button>
            </form>
        </div>
        
    </body>
    
</html>


<?php

 include("siteFooter.php");
?>