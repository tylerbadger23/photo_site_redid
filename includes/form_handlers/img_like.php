<?php
include '../config.php';

if(isset($_GET['photo_id'])) {

    #get user id form current user
    $user_id = $_SESSION['current_id'];
    strip_tags($user_id);
    mysqli_real_escape_string($con, $user_id);

    //filter for code
    $photo_id = strip_tags($_GET['photo_id']);
    $photo_id = mysqli_real_escape_string($con, $photo_id);

    //if photo is exists then proceed
    $check_if_photo_exists = mysqli_query($con, "SELECT * FROM photos WHERE id='$photo_id'");
    if(mysqli_num_rows($check_if_photo_exists) == 1) {
        $check_if_liked_query = mysqli_query($con, "SELECT * FROM photos_likes WHERE user_id='$user_id' AND photo_id='$photo_id'");
        //if zero results then contnue to insert like to database
        if(mysqli_num_rows($check_if_liked_query) == 0 ) { 
            //if database insert is success then return to same page
            if(mysqli_query($con, "INSERT INTO photos_likes VALUES ('','$user_id','$photo_id')")) {
                header("Location: ../../image.php?imgid=".$photo_id);
                exit();
            } else { // run if failed to insert to database
                header("Location: ../../image.php?imgid=".$photo_id."&error=failed_to_insert_to_database");
                exit();
            }
        } else { // run if already liked by user
            header("Location: ../../image.php?imgid=".$photo_id."&error=user_already_liked");
            exit();
        }
    } else { // run if photo doesent exists
        header("Location: ../../image.php?imgid=".$photo_id."&error=photo_doesent_exists_in_database");
        exit();
    }

} else { // run if not set in get vars
    header("Location: ../../image.php?imgid=".$photo_id."&error=no_click");
    exit();
}



