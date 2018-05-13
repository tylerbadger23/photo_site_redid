<?php
include "../config.php";

if(isset($_POST['delete_img_btn'])) {

    $img_id= $_POST['img_id'];

    //select query for location of file
    $select_query = mysqli_query($con, "SELECT * FROM photos WHERE id='$img_id'");

    if(mysqli_num_rows($select_query) == 1) {

        $row = mysqli_fetch_assoc($select_query);

        //unlink and if success then delete from database
        if(unlink("../../".$row['img_location'])) {
            if($delete_img_query = mysqli_query($con, "DELETE FROM photos WHERE id='$img_id'")) {
                header("Location: ../../index.php?error=deleted_success");
                exit();

            } else {//if delete query fails
                header("Location: ../../image.php?imgid=". $img_id ."&error=database_error");
                exit();
            }
        } else { // if location is nt found
            header("Location: ../../image.php?imgid=". $img_id ."&error=img_location_error");
            exit();
        }

    } else { // if ig not found
        header("Location: ../../image.php?imgid=". $img_id ."&error=imgnotfound");
        exit();
    }

} else { // if not set
    header("Location: ../../index.php?error=nodelete");
}