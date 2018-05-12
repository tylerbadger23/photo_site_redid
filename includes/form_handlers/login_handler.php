<?php
include "../config.php";

if(isset($_POST['login_btn'])) {

    //filter data results before goes into dababase
    $username_email = strip_tags($_POST['log_username_email']);
    $username_email = mysqli_real_escape_string($con, $username_email);

    //rehash the new password and run against hashed password in database
    $password = md5(strip_tags($_POST['log_password']));

    //check if user is in database
    $check_user_query = mysqli_query($con,"SELECT * FROM users WHERE username='$username_email' OR email='$username_email' AND password='$password'");

    //check if user exists4
    if(mysqli_num_rows($check_user_query) == 1) {
        $user = mysqli_fetch_assoc($check_user_query);
        //set data to session
    
        $_SESSION['current_username'] = $user['username'];
        $_SESSION['current_id'] = $user['id'];

        #success return to index page
        header("Location: ../../index.php?error=successlogin");
        exit();
    } else { // give error that something was inncorrect
        header("Location: ../../login.php?error=incorrect");
        exit();   
    }

} else {// if user dodnt submit form
    header("Location: ../../login.php");
    exit();
}