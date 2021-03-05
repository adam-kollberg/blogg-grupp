<?php

include('../../path.php');
include(ROOT_PATH . '/database/dbconnection.php');

$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];

$data = [
    'title' => $title,
    'body' => $body,
    'id' => $id,
];


$sql = "UPDATE posts SET title=:title, body=:body WHERE id=:id";
$stm = $pdo->prepare($sql);

if ($stm->execute($data)) {
    header("location:" . BASE_URL . "/post.php");
}

    ?>
<!-- 
$_SESSION'id' = "post updated"; -->