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

        <?php
        //get images from database
        $select_img_query = mysqli_query($con,"SELECT * FROM photos ORDER BY num_likes DESC");
        $select_img_result = mysqli_num_rows($select_img_query);
        //if rows then diaplay images
        if($select_img_result > 0) {
            while($image = mysqli_fetch_assoc($select_img_query)) {
                ?>
                <a href="image.php?imgid=<?php echo $image['id'];?>">
                    <div class="img">
                        <div class="img-content">
                            <img src="<?php echo $image['img_location'] ?>">
                            <p>LIKES: <?php echo $image['num_likes'];?></p>
                        </div>     
                    </div>
                </a><?php 
                } 
            }?>


    </section>

</body>
</html>