<?php

    include("siteHeader.php");
    include("register_login_logic.php");


    $errorMessages = array(

        "loginError" => $_SESSION['loginError'] ?? '',
        "registerError" => $_SESSION['registerError'] ??''
    );

    session_unset();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>


<body> 
    <script src="switchLoginRegister.js"> </script>

    <div class ="container">
        
        <div class="form-box <?= isActiveForm('login-form',$activeForm)?>" id="login-form">
            <form action="Login.php" method="post">
                <h2>Login</h2>
                <?=showError($errorMessages['loginError']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login" value="login">Login</button>
                <p>Don't have an account?  <a href="#" onclick="swapForms('register-form')">Register</a></p> 
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register-form',$activeForm)?>" id="register-form">
            <form action="Login.php" method="post">
                <h2>Register</h2>
                <?=showError($errorMessages['registerError']); ?>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="register" value="register">Register</button>
                <p>Already have an account?  <a href="#" onclick="swapForms('login-form')">Login</a></p> 
            </form>
        </div>

    </div>

</body>

</html>
<?php 

include("siteFooter.php");

?>
