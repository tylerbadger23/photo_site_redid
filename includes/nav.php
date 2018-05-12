
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <a href="index.php"><h2>Photo_Site</h2></a>
                </div>
                <ul>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">About</a></li>
                            
                        <?php # check if user is logged in and show correct links
                        if(isset($_SESSION['current_username']) && $_SESSION['current_username'] != "adminuser") { ?>
                            <li><a href="upload_img.php">Upload</a></li>
                            <li><a href="includes/logout.php">Logout</a></li>
                        <?php } ?>

                        <?php // check if user is not logged in
                        if(!isset($_SESSION['current_username'])) { ?>
                            <li><a href="register.php">SignUp</a></li>
                            <li><a href="login.php">Login</a></li>
                        <?php } ?>  
                        
                        <?php // check if user is not logged in
                        if($_SESSION['current_username'] == 'adminuser') { ?>
                            <li><a href="create_category.php">Create Category</a></li>
                            <li><a href="upload_img.php">Upload</a></li>
                            <li><a href="includes/logout.php">Logout</a></li>
                        <?php } ?> 
                </ul>
            </div>
        </nav>
    </header>

