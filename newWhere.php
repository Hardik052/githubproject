<?php

/*******w******** 
    
    Name: Hardik Bhardwaj
    Date: 2023-02-05
    Description: Making a blog website using php.

****************/

require('connect.php');
$query = "SELECT * FROM products WHERE product_id = :product_id LIMIT 1";

 // A PDO::Statement is prepared from the query.
 $statement = $db->prepare($query);  
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

 // Execution on the DB server is delayed until we execute().
 $statement->bindValue('product_id', $id, PDO::PARAM_INT);
 $statement->execute(); 
 $row = $statement->fetch();


?>
<?php

if($_POST && trim($_POST['comment'])!=''){

$content1 = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$query1 = "INSERT INTO comments(comment_comment) VALUES(:comment_comment)";

 // A PDO::Statement is prepared from the query.
 $statement1 = $db->prepare($query1);  


 // Execution on the DB server is delayed until we execute().
 $statement1->bindValue(':comment_comment', $content1);
 $statement1->execute(); 
 $row1 = $statement1->fetch();
 if($statement->execute()){
    echo "Your content has been uploaded successfully !!";
}else{
    echo"error";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Generation Z !</title>
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
    <a href="post.php">New Product</a>
    <h1><a href="index.php">Generation Z !</a></h1>
    <!-- Remember that alternative syntax is good and html inside php is bad -->

    <h2>Product name</h2>
    <p><?= $row['product_name'] ?></p>

    <h2>Product Description</h2>
    <p><?= $row['product_description'] ?></p>
    <p><a href="edit.php?id=<?=$row['product_id']?>">edit</a></p>
    <form method= "post">
        <label for="comment">Add Comment</label>
        <input type="text" name="comment" id="comment">
        <input type="submit" value="Add comment" name="submit_comment">
    </form>
   
</div>
</body>
</html>