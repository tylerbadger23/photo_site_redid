<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Username | Users</title>
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
                <h2>tyler_laceby</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit tempora ducimus distinctio officiis. 
                Accusantium officiis dicta quibusdam. Rem at dolores, quo quisquam molestiae unde, sint facilis aut deserunt, 
                inventore reiciendis.</p>
                <button class='website-btn'>My Website</button>
            </div>
            <img src="uploads/2.jpeg" alt="user profile image">
        </div>
    </section>


    <h2 class='container check-work' >Check Out My Work</h2>
    <section id='gallery' class='container'>
        <div class="img">
            <div class="img-content">
                <img src="uploads/1.jpeg">
                <h3>Mountain Landscape</h3>
                <br>
                <p><a href="image.php">Learn More</a></p> 
            </div>     
        </div>
        <div class="img">
            <div class="img-content">
                <img src="uploads/1.jpeg">
                <h3>Mountain Landscape</h3>
                <br>
                <p><a href="image.php">Learn More</a></p> 
            </div>     
        </div>
        <div class="img">
            <div class="img-content">
                <img src="uploads/1.jpeg">
                <h3>Mountain Landscape</h3>
                <br>
                <p><a href="image.php">Learn More</a></p> 
            </div>     
        </div>
        <div class="img">
            <div class="img-content">
                <img src="uploads/1.jpeg">
                <h3>Mountain Landscape</h3>
                <br>
                <p><a href="image.php">Learn More</a></p> 
            </div>     
        </div>

    </section>

</body>
</html>