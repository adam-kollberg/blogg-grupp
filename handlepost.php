<?php 

include("database/dbconnection.php"); 


    if (isset($_POST['add-post'])) {

         $title = $_POST['title'];
         $body = $_POST['body'];
        //$url = $_POST['image'];
       
       // $user_id = $_POST['user_id'];
        //$comment_id = $_POST['comment_id'];

echo $title, $body;die();

    }

 $sql = "INSERT INTO posts(title, body) VALUES('$title', '$body')";
$stm = $pdo->prepare($sql);
$stm->execute();
    //$stm->bindParam(':image_IN', $image);
   // $stm->bindParam(':user_id_IN', $user_id);
   // $stm->bindParam(':comment_id_IN', $comment_id);

    if ($stm->execute()) {
        header ("location:index.php");
        Echo "Success";

 }else{
    
    

    echo '<form action="handlepost.php" method="post">
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
    ';

}

    
        

    

        ?>
    

