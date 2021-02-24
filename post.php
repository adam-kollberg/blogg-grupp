<?php 

include("app/database/dbconnection.php"); 


    if (isset($_POST['add-post'])) {

        $title = $_POST['title'];
        $image = $_POST['image'];
        $body = $_POST['body'];
        //$user_id = $_POST['user_id'];
        //$comment_id = $_POST['comment_id'];


        {
    $sql = "INSERT INTO posts(title, image, body) VALUES(:title_IN, :image_IN, :body_IN)";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':title_IN', $title);
    $stm->bindParam(':body_IN', $body);
    $stm->bindParam(':image_IN', $image);
   // $stm->bindParam(':user_id_IN', $user_id);
   // $stm->bindParam(':comment_id_IN', $comment_id);

    if ($stm->execute()) {
        header ("location:post.php");
        Echo "Sucess";

 }else
 echo " tryagain";
}

    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h2>Add post</h2>

<form action="post.php" method="post">
<label>Title</label>
<input type="text" name="title" class>

<label>Body</label>
<textarea name="body" id="body"></textarea>

<label>Image</label>
<input type="file" name="image">

<label>Topic</label>
<option value="">Category?</option>
<option value="">Category?</option>

<button type="submit" name="add-post" class="btn btn-big"> Add Post</button>

</form>
</body>
</html>