<?php


$upload_dir = "uploads/";

$target_file = $upload_dir . basename($_FILES['imageToUpload']['name']);

$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));  

if(isset($_POST['submit'])){

$check = getimagesize($_FILES['imageToUpload']['tmp_name']);
if($check == false){
    echo " the file is not an image!";
    die;
}

}

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
  
    include ("db.php"); 

    $sql = "INSERT INTO image (path) VALUES ('$target_file')";
    $stm = $pdo->prepare($sql);
    if($stm->execute()){

        echo " file is ok";
    }

}else{
    echo " something went wrong";
    
}
?>