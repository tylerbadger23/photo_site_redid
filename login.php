<?php
include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type='text/css' href="assets/general.css">
    <link rel="stylesheet" type='text/css' href="assets/register.css">
</head>
<body>

    <?php require 'includes/nav.php';?>

    <section id="form">
        <div class="container">
            <h2>Login</h2>
            <form action="includes/form_handlers/login_handler.php" method='post'>

                <div class="input-container">
                    <label>Username Or Password</label>
                    <input type="text" name='log_username_email' required>
                </div>

                <div class="input-container">
                    <label>Password</label>
                    <input type="password" name='log_password' required>
                </div>

                <div class="input-container">
                    <button type='submit' name='login_btn'>Login</button>
                </div>

            </form>
        </div>
    </section>


</body>
</html>