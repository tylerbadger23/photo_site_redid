<?php
include 'includes/config.php';
include "includes/login_check.php";
?>
<?php

$img_id = strip_tags($_GET['imgid']);
$img_id = mysqli_real_escape_string($con, $img_id);

$get_img_details_query = mysqli_query($con, "SELECT * FROM photos WHERE id='$img_id'");

if(mysqli_num_rows($get_img_details_query) > 0) {
    $image = mysqli_fetch_assoc($get_img_details_query);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Name | Images</title>
    <link rel="stylesheet" type='text/css' href="assets/general.css">
    <link rel="stylesheet" type='text/css' href="assets/image_page.css">
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

    <section id='img_content'>
        <div class="container">
            <div class="flex-2">
                
                <a href="user.php?username=<?php echo $image['added_by_username'];?>"><p><?php echo $image['added_by_username'];?></p></a>
            </div>
            <img src="<?php echo $image['img_location'] ; ?>" alt="image alt goes here">
            <div class="flex-2 flex-bottom">
                <p><a href="<?php echo $image['img_location'];?>" download>Download Image</a></p>
                <a href="user.php?username=<?php echo $image['added_by_username'];?>"><p>See More From This User</p></a>
            </div>
            <?php
                //get num of likes for image
                $select_likes_query = mysqli_query($con, "SELECT * FROM photos_likes WHERE photo_id='$img_id'");
                $num_results = mysqli_num_rows($select_likes_query);
                if($num_results > 0) {
                    $num_likes = $num_results;
                } else {
                    $num_likes = 0;
                }
            ?>
                <h4 class='like_count'>LIKES: <span><?php echo $num_likes;?></span></h4>
                <a class='like_btn' href='includes/form_handlers/img_like.php?photo_id=<?php echo $img_id;?>'>Like Image</a>
            <div class="flex-2">
                <p class='img_desc'><?php echo $image['description']; ?></p>
                <?php  
                    if($current_username == 'adminuser') { ?>
                    <form class='delete_form' action="includes/form_handlers/delete_img.php" method='POST'>
                        <input type="hidden" name='img_id' value='<?php echo $img_id;?>'>
                        <button type='submit' class='delete' name='delete_img_btn'>Delete Post</button>
                    </form> 
                <?php  }?>
            </div>
        </div>
    </section>



</body>
</html>