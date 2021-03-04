<?php include("path.php");
include("database/dbconnection.php");


if (isset($_GET['id'])) {
  
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id=$id";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetch(); }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/style2.css">

  <title><?php echo $result['title']; ?> | Millhouse</title>
</head>
<body>

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<div class="single-content">

<div class="single-wrapper">
<form action="handleeditpost.php" method="POST" enctype="multipart/form-data">
<table>

<h1 class="post-title">
<label>Title</label>
<input type="text" name="title" value="<?php echo $_GET['edit']; ?>" >

<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/> 
</h1>

<div class="post-content">
<label>Body</label>
<textarea name="body" id="body"> <?php echo $_GET['body']; ?> </textarea>
</div>


<label>Image</label>
<input type="file" name="imageToUpload">
<img src="<?php echo BASE_URL . "/". $result['image']?>" alt="" width="500" height="500">

</table>
<input type="submit" value="updateEdit">

</div>
</div>

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</head>

