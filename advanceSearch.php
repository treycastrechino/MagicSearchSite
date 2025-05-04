<?php 
include("siteHeader.php");
include("advanceSearchLogic.php");


$username = $_SESSION['username'];
$isLoggedIn = $_SESSION['isLoggedIn'];
$userId = $_SESSION['userId'];
session_unset();
$_SESSION['username'] = $username;
$_SESSION['isLoggedIn'] = $isLoggedIn;
$_SESSION['userId'] = $userId;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://localhost/MagicSearchSite/advanceSearchPage.css">
    </head>

    <body>


        <div class="cardSearch" id="cardSearch">
            <form action="advanceSearch.php" method="post">
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

            <div class="allDropdowns">
                <label for="gameFormat">Format:</label>
                <select name="gameFormat" id="gameFormat">
                    <option value="">No Selection</option>
                    <option value="Standard">Standard</option>
                    <option value="Modern">Modern</option>
                    <option value="Commander">Commander</option>
                </select>
                <br>
                <label for="cardType">Card Type:</label>
                <select name="cardType" id="cardType">
                    <option value="">No Selection</option>
                    <option value="Creature">Creature</option>
                    <option value="Land">Land</option>
                    <option value="Instant">Instant</option>
                    <option value="Sorcery">Sorcery</option>
                    <option value="Enchantment">Enchantment</option>
                    <option value="Planeswalker">Planeswalker</option>
                    <option value="Artifact">Artifact</option>
                </select>
                <br>

                <label for="rarity">Rarity:</label>
                <select name="rarity" id="rarity">
                    <option value="">No Selection</option>
                    <option value="mythic">Mythic</option>
                    <option value="rare">Rare</option>
                    <option value="uncommon">Uncommon</option>
                    <option value="common">Common</option>
                </select>

                <br>

            <?php 

            createSetDropdown();

            createCmcDropdown();
            
            
            createSubtypeDropdown();

            createPowerDropdown();

            createToughnessDropdown();
            ?>

        </div>
                <input class="rulesText" type="text" name="rulesText" placeholder="Rules text"> <br>
                <button class="searchCardButton" type="submit" name="searchCard" value="searchCard">Search</button>
            </form>
        </div>
    </body>
    
</html>

<?php 

include("siteFooter.php")

?>