<?php if (isset($_POST['comment-submit'])){
include("database/dbconnection.php");
session_start();
$comment = $_POST['comment'];
$userID = $_SESSION['id'];
$postID = $_POST['id'];

$sql = "INSERT into comments (comment, user_id, post_id) VALUES(:comment_IN, :user_IN, :post_IN )";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':comment_IN', $comment);
    $stm->bindParam(':user_IN', $userID);
    $stm->bindParam(':post_IN', $postID);
    $stm->execute();

    

   if ($stm->execute()) {
   //header ("location:index.php");
   Echo "Sucess";


}
}
 
?>