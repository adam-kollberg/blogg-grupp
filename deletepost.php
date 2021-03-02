
<?php

include('database/dbconnection.php');
include("path.php"); 


$deleteID = $_GET['del'];

$sql = "DELETE FROM posts WHERE (id=$deleteID)";
$stm = $pdo->prepare($sql);



if($stm->execute()) {
    header("location:post.php");
    
 } else {
 
     echo "not";
 }


?>