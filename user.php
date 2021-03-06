<?php
include 'includes/config.php';
include "includes/login_check.php";

$current_id = $_SESSION['current_id'];

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
        $user_id = $user['id'];
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

                <a id='follow_btn' href='includes/form_handlers/user_subscribe.php?userid=<?php echo $user['id']; ?>'>Followers: <?php echo $user['num_followers']; ?></a>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora ducimus distinctio officiis.
                Accusantium officiis dicta quibusdam. Rem at dolores, quo quisquam molestiae unde, sint facilis aut deserunt,
                inventore reiciendis.</p>
                <?php
                    // check if user page user and cuurent user are linked in user following table
                    $following = 0;
                    //query to see if rows in database match
                    $check_following_query = mysqli_query($con, "SELECT * FROM user_follows WHERE follower_id='$user_id' AND following_id='$current_id'");
                    //if results then set following to true
                    if(mysqli_num_rows($check_following_query) == 1) {
                        $following = 1;
                    } else {
                        $following = 0;
                    }

                ?>
                <script>
                        let following_count = <?php echo $following; ?>;
                        //see if button is hovered on then chenge content
                        let follow_btn = document.getElementById('follow_btn');
                        follow_btn.addEventListener("mouseenter", function () {
                            if(follow_btn.innerHTML == "Follow" || follow_btn.innerHTML == "un-follow") {
                                follow_btn.innerHTML = "Followers: <?php echo $user['num_followers']; ?>";
                            } else {
                                if(following_count == 1) { //if they are following already do this
                                    follow_btn.innerHTML = "UNFOLLOW";
                                    follow_btn.addEventListener('mouseleave',function () {
                                        follow_btn.innerHTML = "Followers: <?php echo $user['num_followers']; ?>";
                                    });
                                } else {
                                    follow_btn.innerHTML = "Follow";
                                    follow_btn.addEventListener('mouseleave',function () {
                                        follow_btn.innerHTML = "Followers: <?php echo $user['num_followers']; ?>";
                                    });
                                }
                            }
                        });
                </script>
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
                <a href="image.php?imgid=<?php echo $image['id'];?>">
                    <div class="img">
                        <div class="img-content">
                            <img src="<?php echo $image['img_location'] ?>">
                        </div>
                    </div>
                </a> <?php
                }
            }?>

    </section>

<script src="assets/javascript/user.js"></script>
</body>
</html>
