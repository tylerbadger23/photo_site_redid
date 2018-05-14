<?php


include "../config.php";
include "../login_check.php";


//upload-file
if(isset($_POST['img_upload_btn'])) {

    $selection = $_POST['cat_select'];
    // set file array
    $file = $_FILES['img'];

    //filter_description
    $desc= $_POST['desc'];
    $desc = strip_tags($desc);
    $desc = mysqli_real_escape_string($con, $desc);


    //set file info
    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_path = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error']; 

    //allowed size
    $size_allowed = 1500000;// 1.5mb
    //set allowed array
    $allowed_array = array('jpg','jpeg','png');

    //get ending of file
    $file_ext = explode(".", $file_name);
    $actual_ext = strtolower(end($file_ext));

    if(in_array($actual_ext, $allowed_array)) {
        if($file_error === 0) {
            if($file_size < $size_allowed) {
                #create new unique id in micro seconds
                $file_name_new = uniqid('', true) . "." . $actual_ext;

                //tell where to upload file in root folder
                $file_destination = "uploads/" . $file_name_new;
                $file_destination_actual = "../../uploads/" . $file_name_new;

                #upload final file to destination
                move_uploaded_file($file_path, $file_destination_actual);

                $date_now = date('Y-m-d');

                //query to insert values into db
                $query = mysqli_query($con,"INSERT INTO photos VALUES ('','$title','$desc','$file_destination','$date_now','$file_name_new','$selection','$current_username','0')");
                //head back to index.php
                header("Location: ../../index.php?error=upload_success");

            } else {
                echo " Your file size is too big";
            }
        } else {
            echo "There was an error uploading file";
        }
    } else {
        echo "invalid type of file";
    }
}