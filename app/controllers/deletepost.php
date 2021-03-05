
<?php

include('../../path.php');
include(ROOT_PATH . '/database/dbconnection.php');


$deleteID = $_GET['del'];

$sql = "DELETE FROM posts WHERE id=:delete_IN";
$stm = $pdo->prepare($sql);
$stm -> bindParam("delete_IN", $deleteID); 




if($stm->execute()) {
    header("location:" . BASE_URL . "/post.php");
    
 } else {
 
     echo "something went wrong";
 }


?>