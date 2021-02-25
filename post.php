<?php


include('app/database/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
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

<!-- View the posts -->

<?php

session_start();

echo " Your are logged in as " . $_SESSION['username'];

$sql = ("SELECT id, title, body, FROM posts");
$stm = $pdo->prepare($sql);
$stm->execute();
// $return = $stm->fetch();         Behövs det att man har bindparam?

 while ($row = $stm->fetch()) { ?>

    
     <p>Your message: <br><?php echo $row['message']?> </p>  <br><br>

      
    
    <!-- Ändra så att dessa länkas till delete.php och edit.php vad för info behövs visas när vi ska editera-->


    <a href="=<?php echo $row['username']; echo $row['title']; echo $row['body']; ?>" class="del_btn">Delete</a> <span> </span>
     <a href="=<?php echo $row['username']; echo $row['title']; echo $row['body'];  ?>" class="edit_btn">Edit</a> 
    
    </div>
        <?php } ?>  </div>
    

?>

</form>
</body>
</html>