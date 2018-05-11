<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Markeplace</title>
    <link rel="stylesheet" type='text/css' href="assets/style.css">
</head>
<body>

    <?php require 'includes/nav.php';?>


    <section id='categories' class='container'>
        <h2>Categories</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, ducimus vitae, vel recusandae mollitia architecto, 
        eos libero eaque voluptas necessitatibus magni blanditiis? Molestias qui!</p>

        <form action="results.php" method='POST'>
            <input type="text" name='search' required placeholder='Search... '>
            <button type='submit'>Search</button>
        </form>

        <div class="category_container">
            <a href="#">Nature</a>
            <a href="#">Food</a>
            <a href="#">People</a>
            <a href="#">Animals</a>
            <a href="#">Illustrations</a>
            <a href="#">Tech</a>
        </div>
    </section>

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