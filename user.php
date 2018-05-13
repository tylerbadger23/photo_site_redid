<?php
include 'includes/config.php';
include "includes/login_check.php";

if(isset($_GET['username'])) {

    //clear and check for code
    $page_username = $_GET['username'];
    $page_username = strip_tags($page_username);
    $page_username = mysqli_real_escape_string($con, $page_username);

    $user_select_query = mysqli_query($con, "SELECT * FROM users WHERE username='$page_username'");

    #if results then assign them to user array; else return to index.php
    if(mysqli_num_rows($user_select_query)){
        $user = mysqli_fetch_assoc($user_select_query);
        $username = $user['username'];
    } else{
        header("Location: index.php?error=user_not_found");
        exit();
    }

}//isset check

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $user['username'];?> | Users Page</title>
    <link rel="stylesheet" type='text/css' href="assets/user_page.css">
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

    <section id="user_details">
        <div class="user_grid container" >
            <div class="left">
                <h2><?php  echo $user['username'];?></h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora ducimus distinctio officiis. 
                Accusantium officiis dicta quibusdam. Rem at dolores, quo quisquam molestiae unde, sint facilis aut deserunt, 
                inventore reiciendis.</p>
            </div>
        </div>
    </section>


    <h2 class='container check-work' >Check Out My Work</h2>
    <section id='gallery' class='container'>
    <?php
        //get images from database
        $select_imgs_query = mysqli_query($con,"SELECT * FROM photos WHERE added_by_username='$username' ORDER BY id DESC");
        $select_imgs_result = mysqli_num_rows($select_imgs_query);
        //if rows then diaplay images
        if($select_imgs_result > 0) {
            while($image = mysqli_fetch_assoc($select_imgs_query)) {
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