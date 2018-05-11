<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Name | Images</title>
    <link rel="stylesheet" type='text/css' href="assets/image_page.css">
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

    <section id='img_content'>
         <div class="container">
            <div class="flex-2">
                <h3>Title Goes Here</h3>
                <a href="user.php"><p>tyler_laceby</p></a>
            </div>
            <img src="uploads/1.jpeg" alt="image alt goes here">
            <div class="flex-2 flex-bottom">
                <p><a href="#">Download Image</a></p>
                <a href="user.php"><p>See More From This User</p></a>
            </div>
            <p class='img_desc'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos provident id Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos provident id quisquam deserunt, aliquam dicta eius ut nulla 
            facilis iusto, quam voluptatem fuga rerum nisi qui, doloribus luta? quisquam deserunt, aliquam dicta eius ut nulla 
            facilis iusto, quam voluptatem fuga rerum nisi qui, doloribus luta?</p>
        </div>
    </section>



</body>
</html>