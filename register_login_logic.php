<?php


include('registerLoginFunctions.php');

setActiveForm();


$activeForm = $_SESSION['activeForm'];


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['register'])){

        $_SESSION['activeForm'] = 'register-form';

        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        testUserName($name);
        testEmail($email);
        testPassword($password);
        $passwordHash = setPasswordToHash($password);

        openConnection();

        $checkEmail = $connectionVariable->query("SELECT email FROM user WHERE email = '$email'");
        $checkUsername = $connectionVariable->query("SELECT username FROM user WHERE username = '$name'");

        checkUsernameExists($checkUsername);
        checkEmailExists($checkEmail);
        addUserToDatabase($connectionVariable, $name, $passwordHash, $email);

        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['isLoggedIn'] = true;

        closeConnection($connectionVariable);

        header("Location: index.php");
        exit();
    }
    
    if(isset($_POST['login'])){

        $_SESSION['activeForm'] = 'login-form';

        $email = $_POST['email'];
        $password = $_POST['password'];
        

        openConnection();

        $checkEmail = $connectionVariable->query("SELECT * FROM user WHERE email = '$email'");
        loginEmailPasswordCheck($checkEmail,$password);
        
    }

}


?>