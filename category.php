<?php
include 'includes/config.php';
include "includes/login_check.php";

$cat_id = strip_tags($_GET['id']);
$cat_id = mysqli_real_escape_string($con, $cat_id);
//get current pages category
$get_category_query = mysqli_query($con, "SELECT * FROM categories WHERE id='$cat_id'");

if(mysqli_num_rows($get_category_query)) {
    $category = mysqli_fetch_assoc($get_category_query);
    $current_category = $category['name']; 
}


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
        $select_img_cat_query = mysqli_query($con,"SELECT * FROM photos WHERE category='$current_category'");
        $select_img_cat_result = mysqli_num_rows($select_img_cat_query);
        //if rows then diaplay images
        if($select_img_cat_result > 0) {
            while($image = mysqli_fetch_assoc($select_img_cat_query)) {
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