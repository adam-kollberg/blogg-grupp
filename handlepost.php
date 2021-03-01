<?php 

include("database/dbconnection.php"); 


    if (isset($_POST['add-post'])) {

        $check = getimagesize($_FILES['imageToUpload']['tmp_name']);
        if($check == false){
        echo " the file is not an image!";
        die;
}

         $title = $_POST['title'];
         $body = $_POST['body'];
         
         if( isset($_SESSION['id']) )
         {
             $user_id = $_SESSION['id'];
         }
         else
         {
             $user_id = 1;
         }

         $comment_id = 2;
   
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
echo $title, $body, $user_id, $comment_id;

if(move_uploaded_file($_FILES['imageToUpload']['tmp_name'],  $target_file)){
$sql = "INSERT INTO posts(title, image, body, user_id, comment_id) VALUES('$title','$target_file','$body', '$user_id', '$comment_id')";
$stm = $pdo->prepare($sql);

//$stm->execute();
    //$stm->bindParam(':image_IN', $image);
   // $stm->bindParam(':user_id_IN', $user_id);
   // $stm->bindParam(':comment_id_IN', $comment_id);

    if ($stm->execute()) {
       //header ("location:index.php");
        Echo "Success";

 }

}

   }
?>

    

    
    

