

<?php  

    echo '<div class ="entirePage">';
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

    function showWelcome($username){

        $welcomeMessage ='<h2>' . 'Welcome back ' . $_SESSION['username'] . '!' . '</h2>';

        echo $welcomeMessage;
    }

?>

<link rel="stylesheet" href="headerStyle.css">



    <div class="header">
            <header>
            <?php

            if($_SESSION['username'] != ''){
                
                showWelcome($_SESSION['username']);
            }
            else{

                echo '<h2>Welcome!</h2>';
            }
             ?>
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