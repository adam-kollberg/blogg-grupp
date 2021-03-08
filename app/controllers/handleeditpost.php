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


$sql = "UPDATE posts SET category=:categories, title=:title, body=:body WHERE id=:id";
$stm = $pdo->prepare($sql);

if ($stm->execute($data)) {
    header("location:" . BASE_URL . "/post.php");
}

    ?>




