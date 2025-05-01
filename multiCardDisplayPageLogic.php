<?php

include("multiCardDisplayPageFunctions.php");



if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(isset($_POST['previousPage'])){


        $_SESSION['currentPage'] = $_SESSION['currentPage'] - 1;

        header("Location: http://localhost/MagicSearchSite/multiCardDisplayPage.php");
        exit();
    }

    if(isset($_POST['nextPage'])){


        $_SESSION['currentPage'] = $_SESSION['currentPage'] + 1;

        header("Location: http://localhost/MagicSearchSite/multiCardDisplayPage.php");
        exit();
    }

    if(isset($_POST['lastPage'])){


        $_SESSION['currentPage'] = $_SESSION['totalPageCount'];

        header("Location: http://localhost/MagicSearchSite/multiCardDisplayPage.php");
        exit();
    }
    if(isset($_POST['firstPage'])){


        $_SESSION['currentPage'] = 1;

        header("Location: http://localhost/MagicSearchSite/multiCardDisplayPage.php");
        exit();
    }
}




?>