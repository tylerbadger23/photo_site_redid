<?php
include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image</title>
    <link rel="stylesheet" type='text/css' href="assets/general.css">
    <link rel="stylesheet" type='text/css' href="assets/register.css">
</head>
<body>

    <?php require 'includes/nav.php';?>

    <section id="form">
        <div class="container">
            <h2>Upload To Our Marketplace</h2>
            <form action="includes/form_handlers/image_upload.php" method='post' enctype='multipart/form-data'>

                <div class="input-container">
                    <label>Title</label>
                    <input type="text" name='title' placeholder='Title Goes Here'required>
                </div>

                <div class="input-container">
                    <label>Description</label>
                    <textarea name="desc" rows="8" required placeholder='Enter Content Here...'></textarea>
                </div>

                <div class="input-container">
                    <label>Select Image</label>
                    <input type="file" name='img' required>
                </div>

                <div class="input-container">
                    <label>Select A Category</label>
                    <select name="cat_select">
                     <?php
                        $select_cat_query = mysqli_query($con, "SELECT * FROM categories");
                        if(mysqli_num_rows($select_cat_query) > 0) {
                            while($category = mysqli_fetch_assoc($select_cat_query)) { ?>
                                <option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option>  
                    <?php } }?>

                    </select>
                </div>

                <div class="input-container">
                    <button type='submit' name='img_upload_btn'>Upload</button>
                </div>

            </form>
        </div>
    </section>


</body>
</html>