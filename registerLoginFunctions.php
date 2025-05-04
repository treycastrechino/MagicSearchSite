<?php

function setActiveForm(){

    if (isset($_SESSION['activeForm'])){


    }
    else{
    
        $_SESSION['activeForm'] = 'login-form';
    }
}

function isActiveForm($pformName, $pactiveForm){

    if ($pformName == $pactiveForm){

        return 'active';

    }
    else{
        
        return '';
    }
}

function showError($error){

    if(!empty($error)){

        return "<p class ='error-message'>$error</p>";
    }
    else{
        return '';
    }
}

function testUserName($name){

    if(filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS) == $name){

        //name is okay. Continue

    }
    else{

        $_SESSION['registerError'] = 'Invalid Username';
        header("Location: Login.php");
        exit();

    }


}

function testEmail($email){


    if(filter_var($email,FILTER_VALIDATE_EMAIL) == $email){

        //email is okay. Continue

    }
    else{

        $_SESSION['registerError'] = 'Invalid Email address';
        header("Location: Login.php");
        exit();

    }


}

function testPassword($password){


    if(strlen($password) >= 8 ){

        //password is okay. Continue
        

    }
    else{

        $_SESSION['registerError'] = 'Password must be at least 8 characters';
        header("Location: Login.php");
        exit();

        echo "this wasn't supposed to run";

    }

    function setPasswordToHash($password){

        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        return $passwordHash;
    }
}

function checkUsernameExists($queryResults){

    if($queryResults->num_rows > 0){

        $_SESSION['registerError'] = 'Username is already in use';
        header("Location: Login.php");
        exit();
    }
    else{

    }

}

function checkEmailExists($queryResults){

    if($queryResults->num_rows > 0){
    
        $_SESSION['registerError'] = 'Email is already in use';
        header("Location: Login.php");
        exit();
    }
    else{

    }

}

function addUserToDatabase($connectionVariable,$name, $passwordHash, $email){


    $insertUserQuery = "INSERT INTO user (username, password, email)
    VALUES   ('$name', '$passwordHash', '$email')";
    $connectionVariable->query($insertUserQuery);

}

function loginEmailPasswordCheck($queryResults, $password){

    if($queryResults->num_rows > 0){

        $user = $queryResults->fetch_assoc();
        if(password_verify($password, $user['password'])){

            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['userId'] = $user['id'];
            $_SESSION['isLoggedIn'] = true;
            header("Location: index.php");
            exit();
        }
        else{

            $_SESSION['loginError'] = 'Incorrect Password';
            header("Location: Login.php");
            exit();
        }
    }
    else{

        $_SESSION['loginError'] = 'Email not found';
        header("Location: Login.php");
        exit();
    }

}













?>