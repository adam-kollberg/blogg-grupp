<?php
include('../../path.php');
include(ROOT_PATH . '/database/dbconnection.php');


$category = $_POST['categories'];
$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];



$data = [
    'categories'=>$category,
    'title' => $title,
    'body' => $body,
    'id' => $id,
    
];



if(!empty($_FILES['image_upload']['tmp_name'])){

    $upload_dir = "../uploads/";
    $target_file = $upload_dir . basename($_FILES['image_upload']['name']);

    $check = getimagesize($_FILES['image_upload']['tmp_name']);
    if($check == false){
    echo " the file is not an image!";
    die;
}



$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));  


if(file_exists($target_file)){

    echo "the file aldready exists";
    die;
}

if($_FILES['image_upload']['size'] > 1000000){

    echo " the file is to big";
    die;

}

if($fileType != "png"  && $fileType != "gif" && $fileType != "jpg" && $fileType != "jpeg"){

    echo "You can only upload png, gif  jpg, jpeg";
    die;
}


if(move_uploaded_file($_FILES['image_upload']['tmp_name'], $target_file)){
    

$sql = "UPDATE posts SET image=:img WHERE id=:id";
$stm = $pdo->prepare($sql);

 $fileImg = "/blogg/app/uploads/" . $_FILES['image_upload']['name'];
$stm->bindParam(":img", $fileImg);
$stm->bindParam(":id", $id);

$stm->execute();
            
  //header("location:post.php");

}


}

$sql = "UPDATE posts SET category=:categories, title=:title, body=:body  WHERE id=:id";
$stm = $pdo->prepare($sql);

if ($stm->execute($data)) {
    header("location:" . BASE_URL . "/post.php");

}


    ?>




