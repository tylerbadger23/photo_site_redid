<?php
include 'includes/config.php';
include "includes/login_check.php";
include "includes/admin_check.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Markeplace</title>
    <link rel="stylesheet" type='text/css' href="assets/general.css">
    <link rel="stylesheet" type='text/css' href="assets/register.css">
</head>
<body>

    <?php require 'includes/nav.php';?>

    <section id="form">
            <div class="container">
                <h2>Create Category</h2>
                <form action="includes/form_handlers/category_create.php" method='post'>

                    <div class="input-container">
                        <label>Name</label>
                        <input type="text" name='cat_name' required>
                    </div>

                    <div class="input-container">
                        <button type='submit' name='cat_create_btn'>Create</button>
                    </div>

                </form>
            </div>
        </section>
</body>
</html>