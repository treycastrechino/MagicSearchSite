<?php

if (isset($_SESSION['activeForm'])){


}
else{

    $_SESSION['activeForm'] = 'login-form';
}

$activeForm = $_SESSION['activeForm'];

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


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['register'])){

        $_SESSION['activeForm'] = 'register-form';

        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        if(filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS) == $name){

            //name is okay. Continue

        }
        else{

            $_SESSION['registerError'] = 'Invalid Username';
            header("Location: Login.php");
            exit();

            echo "this wasn't supposed to run";

        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL) == $email){

            //email is okay. Continue

        }
        else{

            $_SESSION['registerError'] = 'Invalid Email address';
            header("Location: Login.php");
            exit();

            echo "this wasn't supposed to run";

        }

        if(strlen($password) >= 8 ){

            //password is okay. Continue
            $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        }
        else{

            $_SESSION['registerError'] = 'Password must be at least 8 characters';
            header("Location: Login.php");
            exit();

            echo "this wasn't supposed to run";

        }

        openConnection();
        $checkEmail = $connectionVariable->query("SELECT email FROM user WHERE email = '$email'");
        $checkUsername = $connectionVariable->query("SELECT username FROM user WHERE username = '$name'");
        if($checkUsername->num_rows > 0){

            $_SESSION['registerError'] = 'Username is already in use';
            header("Location: Login.php");
            exit();
        }
        else{

            echo "the username is free";
        }

        if($checkEmail->num_rows > 0){
    
            $_SESSION['registerError'] = 'Email is already in use';
            header("Location: Login.php");
            exit();
        }
        else{

            echo "the email is free";
        }

        $insertUserQuery = "INSERT INTO user (username, password, email)
                            VALUES   ('$name', '$passwordHash', '$email')";
        $connectionVariable->query($insertUserQuery);
        closeConnection($connectionVariable);
    }
    
    if(isset($_POST['login'])){

        $_SESSION['activeForm'] = 'login-form';

        $email = $_POST['email'];
        $password = $_POST['password'];
        

        openConnection();
        $checkEmail = $connectionVariable->query("SELECT * FROM user WHERE email = '$email'");
        if($checkEmail->num_rows > 0){
    
            $user = $checkEmail->fetch_assoc();
            if(password_verify($password, $user['password'])){
    
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['isLoggedIn'] = true;
                header("Location: index.php");
                exit();
            }
        }
        
    }

}


?>