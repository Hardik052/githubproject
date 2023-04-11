<?php

/*******w******** 
    
    Name: Hardik Bhardwaj
    Date: 2023-02-05
    Description: Making a blog website using php.

****************/

require('connect.php');
if (isset($_GET['id'])) { // Retrieve quote to be edited, if id GET parameter is in URL.
        $id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build SQL query
        $query = "DELETE FROM shopserver WHERE product_id = :product_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $id, PDO::PARAM_INT);
    
        $statement->execute();
        $blog = $statement->fetch();
    } 
    else {
        $id = false; // False 
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Delete Post</title>
</head>
<body>
<header>
    <!--- nav bar and other stuff on top-->
    <!-- put a logo and social handles-->
    <!-- nav bar-->
    <div id= "main_nav">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="new_item.php">Sell / Donate</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
        <li><a href="edit.php">Store Location</a></li>
    </ul>
    </div>

</header>
    <div class="content">
<a href="index.php">Home</a>
    &nbsp; &nbsp;
    <a href="post.php">New Post</a>
    <h1><a href="index.php">My Amazing blog</a></h1>
    <p>Click delete to delete the data !</p>
<form method="post" action="delete.php">
                <input type="hidden" name="id" value="<?= $rows['id'] ?>">
                <input type="submit" value="delete">
            </form>

</form>
</div>
</body>
</html>