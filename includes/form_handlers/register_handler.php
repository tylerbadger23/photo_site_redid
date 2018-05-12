<?php

include "../config.php";

if(isset($_POST['register_btn'])) {
    $error_array = array();

    //get variables for filtering and checks
    $fname = strip_tags($_POST['reg_fname']);
    $fname = mysqli_real_escape_string($con, $fname);
    $fname = ucfirst(strtolower($fname));
    $fname = str_replace(' ','',$fname);
    $_SESSION['reg_fname'] = $fname;

    $lname = strip_tags($_POST['reg_lname']);
    $lname = mysqli_real_escape_string($con, $lname);
    $lname = ucfirst(strtolower($lname));
    $lname = str_replace(' ','',$lname);
    $_SESSION['reg_lname'] = $lname;

    $username = strip_tags($_POST['reg_username']);
    $username = mysqli_real_escape_string($con, $username);
    $username = strtolower($username);
    $username = str_replace(' ','',$username);
    $_SESSION['reg_username'] = $username;

    $email = strip_tags($_POST['reg_email']);
    $email = mysqli_real_escape_string($con, $email);
    $email = strtolower($email);
    $email = str_replace(' ','',$email);
    $_SESSION['reg_email'] = $email;

    $email2 = strip_tags($_POST['reg_email2']);
    $email2 = mysqli_real_escape_string($con, $email2);
    $email2 = strtolower($email2);
    $email2 = str_replace(' ','',$email2);
    $_SESSION['reg_email2'] = $email2;

    $password = strip_tags($_POST['reg_password']);
    $password = mysqli_real_escape_string($con, $password);

    $password2 = strip_tags($_POST['reg_password2']);
    $password2 = mysqli_real_escape_string($con, $password2);

    //Do validation and checks for valid content
   
    //check both first and last name langths
    if(strlen($fname) > 25 || strlen($fname) < 2 || strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=namelength"); 
        exit();
    }

    //check for valid characters in names
    if(preg_match("/[^a-zA-Z]/",$fname)|| preg_match("/[^a-zA-Z]/",$lname )) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=namesinvalidchars");      
        exit();
    }

    if(strlen($username) > 25 || strlen($username) < 6)  {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=usernamelength");
        exit();
    }

    //check characters to see if valid characters in username and check db for taken
    if(preg_match("/[^a-zA-Z0-9]/",$username)) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=usernameinvalidchars");
        exit();
    } else { //if no error then check database for taken already
        //query to db
        $username_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");

        //check db for rows
        if(mysqli_num_rows($username_query) > 0 ) {
            array_push($error_array,"error");  
            header("Location: ../../register.php?error=usernametaken");
            exit();
        }
    }

    //email

    //check emails match
    if($email != $email2 ) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=emailsdontmatch"); 
        exit();
    }

    //check if email is in valid format and if it is taken
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //query to see results from db
        $check_emails_results = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

        //if results display error
        if(mysqli_num_rows($check_emails_results) > 0 ) {
            array_push($error_array,"error");  
            header("Location: ../../register.php?error=emailtaken"); 
            exit();
        }
    } else {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=emailsinvalid");
        exit();
    }

    //password

    //check if password1 and 2 match
    if($password != $password2) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=passwordsdontmatch");
        exit();
    }
    //check if they are too long or short
    if(strlen($password) > 25 || strlen($password) < 5) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=passwordlength");
        exit();
    }

    //check characters to see if valid characters in password
    if(preg_match("/[^a-zA-Z0-9]/",$password)) {
        array_push($error_array,"error");  
        header("Location: ../../register.php?error=passwordinvalidchars");
        exit();
    }


    //final steps

    //if errro free continue
    if(!in_array("error", $error_array)) {

        #get date 
        $date_created = date('Y-m-d');
        //hash password
        $password_new = md5($password);

        //create user_photo default
        $profile_picture = "assets/img/head_belize_hole.png";

        //create default bio
        $bio = "Hello Check out my work and plase check follow me on social media";

        //send data to database
        $send_query = mysqli_query($con,"INSERT INTO users VALUES ('','$fname','$lname','$email','$bio','$username','$profile_picture','$date_created','$password_new')");

        #success message
        header("Location: ../../login.php?error=success");
        exit();
    }

//if user went ot page wirthout submitting form
} else {
    header("Location: ../../register.php?error=noclick");
    exit();
}