<?php
include 'includes/config.php';
include "includes/login_check.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Markeplace</title>
    <link rel="stylesheet" type='text/css' href="assets/style.css">
    <link rel="stylesheet" type='text/css' href="assets/general.css">
</head>
<body>

    <?php require 'includes/nav.php';?>

    <section id="second-nav">
        <div class="container second_nav">
            <a href="index.php"><p>Go Back</p></a>
            <form action="results.php" method='POST'>
                <input type="text" name='search' required placeholder='Search...'>
                <button type='submit'>Search</button>
            </form>
        </div>
    </section>

    <section id='gallery' class='container'>

        <div class="img">
            <div class="img-content">
                <img src="uploads/1.jpeg">
                <h3>Mountain Landscape</h3>
                <br>
                <p><a href="image.php">Learn More</a></p> 
            </div>     
        </div>

    </section>

</body>
</html>