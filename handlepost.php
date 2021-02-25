<?php 


include("app/database/dbconnection.php"); 


echo " New post";


    if (isset($_POST['add-post'])) {

 
         $title = $_POST['title'];
        //$url = $_POST['image'];
         $body = $_POST['body'];
       // $user_id = $_POST['user_id'];
        //$comment_id = $_POST['comment_id'];

echo $title;die();

    }

?>

   /*  $sql = "INSERT INTO posts(username, title, body) VALUES('$username', '$title', '$body')";
$stm = $pdo->prepare($sql);
$stm->execute();
    //$stm->bindParam(':image_IN', $image);
   // $stm->bindParam(':user_id_IN', $user_id);
   // $stm->bindParam(':comment_id_IN', $comment_id);

    if ($stm->execute()) {
        header ("location:index.php");
        Echo "Sucsess";

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

    
        }
    

