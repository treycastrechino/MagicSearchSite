<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "magicsearchsitedb";
$connectionVariable = null;


function openConnection(){

    global $db_server;
    global $db_user;
    global $db_password;
    global $db_name;
    global $connectionVariable;
    try{

        $connectionVariable = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    
    }
    catch(mysqli_sql_exception){
    
        echo "could not connect";
    }
    

}

function closeConnection($pconnVariable){

    if(isset($pconnVariable)){

        mysqli_close($pconnVariable);
    }

    else{

        echo 'connection not closed. Connection not Found';
    }

    
}


?>