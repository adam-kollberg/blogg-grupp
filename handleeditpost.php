<?php include("path.php");
include("database/dbconnection.php");?>

<!-- $id = $_GET['id']; -->
<!-- $sql = "SELECT * FROM posts WHERE id=$id"; -->
<!-- $stm = $pdo->prepare($sql); -->
<!-- $stm->execute(); -->
<!-- //$result = $stm->fetch(); -->

<?php 
if(isset($_POST['update_clicked']) && isset($_GET['edit'])) {
 $new_title = $_POST['title'];
 $new_body = $_POST['body'];
 $id = $_GET['edit'];
 $stm = "UPDATE posts SET
         title = :title, 
         body = :body 
         WHERE id = $id";

 $stmt->prepare($stm);
 $stmt->bindParam(":title", $new_title);
 $stmt->bindParam(":body", $body);
 if(!$stmt->execute()) {
 die("Something went wrong!");
 } else {
 header("location:editpost.php?edit=$id");
 }
}
?>
