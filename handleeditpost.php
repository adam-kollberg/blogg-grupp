<?php include("path.php");
include("database/dbconnection.php");?>

<!-- $id = $_GET['id']; -->
<!-- $sql = "SELECT * FROM posts WHERE id=$id"; -->
<!-- $stm = $pdo->prepare($sql); -->
<!-- $stm->execute(); -->
<!-- //$result = $stm->fetch(); -->
<?php
if(isset($_POST['updateEdit']))
{
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_SESSION['id'];
    $category = $_POST['categories'];

   $stm = $pdo->query("UPDATE posts SET body ='$body', title = '$title', category ='$category' WHERE id=$id");
 
   
 if($stm->execute()){
     header("location:../editpost.php");
 }else{
     echo "error";
 }
}
 ?>