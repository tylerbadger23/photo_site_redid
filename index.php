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


    <section id='categories' class='container'>
        <h2>Categories</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, ducimus vitae, vel recusandae mollitia architecto, 
        eos libero eaque voluptas necessitatibus magni blanditiis? Molestias qui!</p>

        <form action="results.php" method='POST'>
            <input type="text" name='search' required placeholder='Search... '>
            <button type='submit'>Search</button>
        </form>

        <div class="category_container">
            <?php
                //get data from database
                $get_cats_query = mysqli_query($con,"SELECT * FROM categories");
                //show results
                if(mysqli_num_rows($get_cats_query) > 0) {
                    while($row = mysqli_fetch_assoc($get_cats_query)) {
                        ?><a href="category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
                <?php } } ?>
        </div>
    </section>

    <section id='gallery' class='container'>

        <?php
        //get images from database
        $select_img_query = mysqli_query($con,"SELECT * FROM photos ORDER BY id DESC");
        $select_img_result = mysqli_num_rows($select_img_query);
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