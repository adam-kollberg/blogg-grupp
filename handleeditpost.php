<?php include("path.php");
include("database/dbconnection.php");
session_start();
?>

<?php


$editID = $_GET['id'];
$editBody = $_GET['body'];

//$stm = $pdo->query('SELECT id, title, body, image FROM posts');
$sql = ("UPDATE posts SET body = '$editBody'  WHERE id='$id'");
$stm = $pdo->prepare($sql);
$stm->execute();

header("location:post.php");
    


 ?>
<!-- 
$_SESSION'id' = "post updated"; -->