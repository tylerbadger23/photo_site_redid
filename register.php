<?php
include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" type='text/css' href="assets/general.css">
    <link rel="stylesheet" type='text/css' href="assets/register.css">
</head>
<body>

    <?php require 'includes/nav.php';?>

    <section id="form">
        <div class="container">
            <h2>Register For Site</h2>
            <form action="includes/form_handlers/register_handler.php" method='post'>

                <div class="input-container label-top">
                    <label>* Required</label>
                </div>

                <div class="input-container">
                    <label>First Name</label>
                    <input type="text" name='reg_fname' required>
                </div>

                <div class="input-container">
                    <label>Last Name</label>
                    <input type="text" name='reg_lname' required>
                </div>

                <div class="input-container">
                    <label>Username</label>
                    <input type="text" name='reg_username' required>
                </div>

                <div class="input-container">
                    <label>Email</label>
                    <input type="email" name='reg_email' required>
                </div>

                <div class="input-container">
                    <label>Confirm Email</label>
                    <input type="email" name='reg_email2' required>
                </div>

                <div class="input-container">
                    <label>Password</label>
                    <input type="password" name='reg_password' required>
                </div>

                <div class="input-container">
                    <label>Confirm Password</label>
                    <input type='password' name='reg_password2' required>
                </div>
                <div class="input-container">
                    <button type='submit' name='register_btn'>Submit</button>
                </div>

            </form>
        </div>
    </section>


</body>
</html>