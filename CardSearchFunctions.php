<?php 

/* Example url to return cards 

"https://api.magicthegathering.io/v1/cards?supertypes=legendary&types=creature&colors=r,w"


Each field below can be used as a query parameter. By default, fields that have a singular value such as rarity, 
set, and name will always use a logical “or” operator when querying with a list of values. Fields that can have multiple values
 such as colors, supertypes, and subtypes can use a logical “and” or a logical “or” operator.

The accepted delimiters when querying fields are the pipe character or a comma character. The pipe represents a logical “or”, and
 a comma represents a logical “and”. The comma can only be used with fields that accept multiple values (like colors).

Example:name=nissa, worldwaker|jace|ajani, caller More examples: colors=red,white,blue versus colors=red|white|blue

    Search paramaters:

    "name" - The card name. For split, double-faced and flip cards, just the name of one side of the card. 
    Basically each ‘sub-card’ has its own record.

    "layout" - The card layout. Possible values: normal, split, flip, double-faced, token, plane, scheme, phenomenon,
     leveler, vanguard, aftermath

    "cmc" - Converted mana cost. Always a number

    "colors" - The card colors. Usually this is derived from the casting cost, but some cards are special (like the back
     of dual sided cards and Ghostfire). The colors are R(red),W(white),B(black),G(green),U(blue)

        Note: This API does not include the "colorless" symbol that was introduced into the game and can not be searched by colorless
        It also can not be reversed to assume that each card without a "color" array is colorless. The lack just means the data was not pertinent
        to the card not that it was colorless.

    "colorIdentity" - The card’s color identity, by color code. [“Red”, “Blue”] becomes [“R”, “U”]. A card’s color identity
     includes colors from the card’s rules text.

    "type" - The card type. This is the type you would see on the card if printed today. Note: The dash is a UTF8 ‘long dash’
     as per the MTG rules

    "supertypes" - The supertypes of the card. These appear to the far left of the card type. Example values: Basic, Legendary,
     Snow, World, Ongoing

    "types" - The types of the card. These appear to the left of the dash in a card type. Example values: Instant, Sorcery, Artifact,
     Creature, Enchantment, Land, Planeswalker

    "subtypes" - The subtypes of the card. These appear to the right of the dash in a card type. Usually each word is its own subtype.
     Example values: Trap, Arcane, Equipment, Aura, Human, Rat, Squirrel, etc.

    "rarity" - The rarity of the card. Examples: Common, Uncommon, Rare, Mythic Rare, Special, Basic Land

    "set" - The set the card belongs to (set code).

        The set codes can be found here: https://en.wikipedia.org/wiki/List_of_Magic:_The_Gathering_sets

    "setName" - The set the card belongs to. 

        Note that this functionality does not work well with sets that are not one word. Use "Set" as the standard search paramater.

    "text" - The oracle text of the card. May contain mana symbols and other symbols.

    "flavor" - The flavor text of the card.

    "artist" - The artist of the card. This may not match what is on the card as MTGJSON corrects many card misprints.

    "number" - The card number. This is printed at the bottom-center of the card in small text. This is a string, not an integer, 
    because some cards have letters in their numbers.

    "power" - The power of the card. This is only present for creatures. This is a string, not an integer, because some cards have
     powers like: “1+*”

    "tougness" - The toughness of the card. This is only present for creatures. This is a string, not an integer, because some cards
     have toughness like: “1+*”

    "loyalty" - The loyalty of the card. This is only present for planeswalkers.

    "language" - The language the card is printed in. Use this parameter along with the name parameter when searching by foreignName

    "gameFormat" - The game format, such as Commander, Standard, Legacy, etc. (when used, legality defaults to Legal unless supplied)

    "legality" - The legality of the card for a given format, such as Legal, Banned or Restricted.

    "page" - The page of data to request

    "pageSize" - The amount of data to return in a single request. The default (and max) is 100.

    "orderBy" - The field to order by in the response results

    "random" - Fetch any number of cards (controlled by pageSize) randomly

    "contains" - Filter cards based on whether or not they have a specific field available (like imageUrl)

    "ID" - A unique id for this card. It is made up by doing an SHA1 hash of setCode + cardName + cardImageName

    "multiverseid" - The multiverseid of the card on Wizard’s Gatherer web page. Cards from sets that do not exist on Gatherer will NOT have 
    a multiverseid. Sets not on Gatherer are: ATH, ITP, DKM, RQS, DPA and all sets with a 4 letter code that starts with a lowercase ‘p’.


    Note:

        At the time of creation the API card collection only goes up to the set Outlaws of Thunder Junction

        It is also missing images for certain promo or alternate art cards.

    Random search code just for reference:

        $searchConditions = addInitialSearchCondition('set','MIR');
        $searchConditions = addAdditionalSearchConditions($searchConditions,'colors',"b,u");
        $testCards = returnCardJson($searchConditions);
        showAllCardsFromSearch($testCards);

*/



const ENDPOINT = "https://api.magicthegathering.io/v1/cards?";

/* Will return one or more cards stored in a Json object */

function returnCardJson($pSearchConditions,$pageNumber){

    $pageSearch = 'page='. $pageNumber . '&pageSize=20';
    $searchQuery = ENDPOINT . $pageSearch . $pSearchConditions;
    $response = json_decode(file_get_contents("$searchQuery"), true);

    return $response;

}

function getTotalCardCountFromSearchConditions($cardSearchConditions){

    $cardSearchUrl = ENDPOINT . $cardSearchConditions;
    $headers = get_headers($cardSearchUrl,true);
    $totalCount = $headers['Total-Count'];
    return $totalCount;
}

function determinePageCountFromTotalCardCount($totalCardCount,$cardsPerPage){

    $pageCount = $totalCardCount / $cardsPerPage;
    $pageCount = ceil($pageCount);
    return $pageCount;
}


function addSearchCondition($SearchConditions,$newCondition, $conditionText){

    $SearchConditions = $SearchConditions . '&' . $newCondition . '='. $conditionText;

    return $SearchConditions;

}

function showCardImage($cardJsonObject, $cardIndex){

    $myImageUrl = $cardJsonObject['cards']["$cardIndex"]['imageUrl'];
    $cardMultiverseID = $cardJsonObject['cards']["$cardIndex"]['multiverseid'];
    $urlString = '<img id="'. $cardMultiverseID;
    $urlString = $urlString . '" src="';
    $urlString = $urlString . $myImageUrl;
    $urlString = $urlString . '"onClick="onClick(this.id)" style="width:250px;height:350px;">';
    echo $urlString;
}

function showAllCardsFromSearch($cardJson){

    $numOfCards = count($cardJson['cards']);
    echo '<br>';
    for($i = 0; $i < $numOfCards; $i++){

        if(array_key_exists('imageUrl',$cardJson['cards'][$i])){

            showCardImage($cardJson, $i);
            echo '<br>';
        }
        else{

            echo "No image found for " . $cardJson['cards'][$i]['name']. ' from ' . $cardJson['cards'][$i]['setName'] . '<br>';
            echo '<img src="Images/cardNotFound.jpg"/>';
            echo '<br>';
        }
    }

}



// this function is nice for a proof of concept but there are data limits on the API (5000 requests/hr).
// The newest card set (tarkir dragonstorm) ends around 700,000 (multiverseid) but there are gaps and this function may run 15 times before returning a valid result.
function returnRandomCardUrl(){

    $cardJson = null;
    while($cardJson == null){

    $randomCardID = rand(0,700000);
    $searchCondition = addSearchCondition('','multiverseid', $randomCardID);
    $cardJson = returnCardJson($searchCondition,1);


    // see if the random search returned a card
    if(count($cardJson['cards']) != 0){

        // check to see if it has an image
        if(array_key_exists('imageUrl',$cardJson['cards'][0])){

            //let the loop exit
        }
        else{

            $cardJson = null;
        }
    }
    else{

        $cardJson = null;
    }

    }

    $myImageUrl = $cardJson['cards'][0]['imageUrl'];
    return $myImageUrl;
}

?>