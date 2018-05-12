<?php

include "../config.php";

if(isset($_POST['cat_create_btn'])) {

$error_array = array();
$category_name = strip_tags($_POST['cat_name']);
$category_name = mysqli_real_escape_string($con, $category_name);
$category_name = ucfirst($category_name);

//if less than 50 characters go back
if($category_name > 50 ) {
    array_push($error_array,"error");
    header("Location: ../../index.php");
    exit();
}

//check if already in database
$check_cat_query = mysqli_query($con, "SELECT * FROM categories WHERE name='$category_name'");
$result_check = mysqli_num_rows($check_cat_query);

//do check if already there do error and relocate
if($result_check != 0) {

    //relocate
    header("Location: ../../create_category.php?error=alreadytaken");
    exit();
}

//run query to database
$add_cat_query = mysqli_query($con, "INSERT INTO categories VALUES ('','$category_name') ");

//relocate
header("Location: ../../index.php?error=addedcategory");
exit();


} else { # if btn is not pressed
    header("Location: ../../index.php");
    exit();
}