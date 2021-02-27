<?php 


include("database/dbconnection.php"); 

    if (isset($_POST['add-post'])) {

 
         $title = $_POST['title'];
        //$url = $_POST['image'];
         $body = $_POST['body'];
       // $user_id = $_POST['user_id'];
        //$comment_id = $_POST['comment_id'];

if($title == '' || $body == ''){
    //set error
    $error = 'please fill out all required fields';

}else{
     $sql = "INSERT INTO posts
                    (title,body)
                VALUES('$title', '$body')";

    $stmtinsert = $db->prepare($sql);


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
    <!-- Enter posts -->

    

<h2>Add post</h2>

<form action="handlepost.php" method="post">
<table>

<label>Title</label>
<input type="text" name="title" class>


<label>Body</label>
<textarea name="body" id="body"></textarea>

<label>Image</label>
<input type="file" name="image">

</table>
<button type="submit" name="add-post" class="btn btn-big"> Add Post</button>
</form>

</body>
</html>