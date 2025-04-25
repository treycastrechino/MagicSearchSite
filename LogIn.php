<?php
    //This page will be used to log in.
    //Should somebody already be logged in it should redirect them to the home page with a "already logged in" message

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
    
    <div class ="container">
        <div class="form-box active" id="login-form">
            <form action="">
                <h2>Login</h2>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account?  <a href="#" onclick="swapForms('register-form')">Register</a></p> 
            </form>
        </div>

        <div class="form-box" id="register-form">
            <form action="">

                <h2>Register</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="register">Register</button>
                <p>Already have an account?  <a href="#" onclick="swapForms('login-form')">Login</a></p> 
            </form>
        </div>
    </div>

    <script src="switchLoginRegister.js"> </script>

</body>
</html>