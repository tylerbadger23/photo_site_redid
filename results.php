<?php
include 'includes/config.php';
include "includes/login_check.php";

//get images from database
$search = strip_tags($_POST['search']);
$search = mysqli_real_escape_string($con, $search);
$search = ucfirst(strtolower($search));

if(isset($_POST['search'])) {


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $search;?> | Search Results</title>
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

    <?php 

    $select_img_query = mysqli_query($con,"SELECT * FROM photos WHERE category LIKE '%$search%' OR title LIKE '%$search%' OR date_uploaded LIKE '%$search%' OR added_by_username LIKE '%$search%' ORDER BY id DESC");
    $select_img_result = mysqli_num_rows($select_img_query);
    if($select_img_result > 0) {
        echo "<div class='count'>" . $select_img_result . "</div>";
    } ?>
    <section id='gallery' class='container'>

        <?php

        //if rows then diaplay images
        if($select_img_result > 0) {
            while($image = mysqli_fetch_assoc($select_img_query)) {
                ?>
                <div class="img">
                    <div class="img-content">
                        <img src="<?php echo $image['img_location'] ?>">
                        <h3><?php echo $image['title'];?></h3>
                        <br>
                        <p><a href="image.php?imgid=<?php echo $image['id'];?>">Learn More</a></p> 
                    </div>     
                </div> <?php 
                } 
            }?>

    </section>

</body>
</html>

<?php  }//end of search if
    else { //if search is empty
        header("Location: index.php?error=searchempty");
        exit();
    }
?>