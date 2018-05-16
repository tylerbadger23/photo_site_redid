<?php
include "../config.php";

//check if value is set
if(isset($_GET['userid'],$_SESSION['current_id'])) {
    //sanitize data
    $current_id = strip_tags($_SESSION['current_id']);
    $current_id = mysqli_real_escape_string($con,  $current_id);
    

    $user_id = strip_tags($_GET['userid']);
    $user_id = mysqli_real_escape_string($con, $user_id);

    $check_user_exists = mysqli_query($con, "SELECT username, num_followers FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_assoc($check_user_exists);
    $user_follow_count = $user['num_followers'];

    //check if followed alfready
    $check_if_already_following = mysqli_query($con, "SELECT * FROM user_follows WHERE following_id='$current_id' AND follower_id='$user_id'");
    $num_rows = mysqli_num_rows($check_if_already_following);

    //check if following already
    if($num_rows == 1) {
        //since user already is following de-follow user
        //dete query
        $delete_folow_query = mysqli_query($con, "DELETE FROM user_follows WHERE following_id='$current_id' AND follower_id='$user_id'");
        //decrement following count
        $user_follow_count = $user_follow_count - 1; // increment count by one
        $insert_query_count = mysqli_query($con, "UPDATE users SET num_followers='$user_follow_count' WHERE id='$user_id'");
        header("Location: ../../index.php?error=unfollowed_sucessfull");
        exit();
    } else { //continue since user is not followed

            $insert_query = mysqli_query($con, "INSERT INTO user_follows VALUES ('','$user_id','$current_id')");

            //increment_follow_count
            $user_follow_count = $user_follow_count + 1; // increment count by one
            $insert_query_count = mysqli_query($con, "UPDATE users SET num_followers='$user_follow_count' WHERE id='$user_id'");
            header("Location: ../../index.php?error=success_following_now");
            exit();
    }

} else {
    header("Location: ../../index.php?error=no_user_found");
    exit();
}