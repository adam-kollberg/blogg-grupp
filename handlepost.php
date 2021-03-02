<?php 

include("database/dbconnection.php"); 


    if (isset($_POST['add-post'])) {

        $check = getimagesize($_FILES['imageToUpload']['tmp_name']);
        if($check == false){
        echo " the file is not an image!";
        die;
}
session_start();
         $title = $_POST['title'];
         $body = $_POST['body'];
         $user_id = $_SESSION['id'];
         $comment_id = 2;
        //$comment_id = $_POST['comment_id'];
        $upload_dir = "app/uploads/";

$target_file = $upload_dir . basename($_FILES['imageToUpload']['name']);

$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));  


if(file_exists($target_file)){

    echo "the file aldready exists";
    die;
}

if($_FILES['imageToUpload']['size'] > 1000000){

    echo " the file is to big";
    die;

}

if($fileType != "png"  && $fileType != "gif" && $fileType != "jpg" && $fileType != "jpeg"){

    echo "You can only upload png, gif  jpg, jpeg";
    die;
}


if(move_uploaded_file($_FILES['imageToUpload']['tmp_name'],  $target_file)){
$sql = "INSERT INTO posts (title, image, body, user_id, comment_id) VALUES('$title','$target_file','$body', '$user_id', '$comment_id')";
$stm = $pdo->prepare($sql);



    $stm->execute();
            
  header("location:post.php");

 }

}

   
?>



    

    
    

