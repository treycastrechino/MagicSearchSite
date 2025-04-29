

<?php  
    include("databaseInterface.php");
    session_start();

    if (isset($_SESSION['username'])){

        // do nothing

    }
    else{
    
        $_SESSION['username'] = '';

    }
    if (isset($_SESSION['email'])){

        // do nothing
    }
    else{
    
        $_SESSION['email'] = '';
    
    }
    if (isset($_SESSION['isLoggedIn'])){

      // do nothing
    
    }
    else{
    
        $_SESSION['isLoggedIn'] = false;

    }

    function showWelcome(){

        $welcomeMessage = 'Welcome ' . $_SESSION['username'] . '!';

        return "<h2>$welcomeMessage</h2>";
    }

?>

<link rel="stylesheet" href="headerStyle.css">


<div class = "headerContainer">
<script src="logout.js"> </script>
    <div class="header">
            <header>
            <?=showWelcome(); ?>
                <p>
                <?php 

                if($_SESSION['isLoggedIn']){

                    echo '<a href="index.php">Home</a>';
                    echo '<a href="advanceSearch.php">Advanced Search</a>';
                    echo '<a href="decks.php">My Decks</a>';
                    echo '<a href="wishlistDisplay.php">Wishlist</a>';
                    echo '<a href="logout.php">Logout</a>';
                }
                
                else{

                    echo '<a href="index.php">Home</a>';
                    echo '<a href="advanceSearch.php">Advanced Search</a>';
                    echo '<a href="Login.php">Login</a>';
                }

                ?>  
                </p>
            </header>
        </div>
        
</div>

    
