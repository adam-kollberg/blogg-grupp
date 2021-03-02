<?php include("path.php"); 
include("database/dbconnection.php");
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

<?php $stm = $pdo->query("SELECT * FROM posts");?>
<div class="page-wrapper">

<h1 class="slider-title">Update Posts</h1>
    
      <?php while ($row = $stm->fetch()) { ?>
      <div class="post-wrapper">
      
        <div class="post">
        
          <img src="<?php echo $row['image']?>  " alt="" class="slider-image">
          <div class="post-content">
            <?php echo ($result['body']); ?>
          </div>
        


<div class="single-wrapper">
<div class="single">
<form action="editpost.php" method="get" enctype="multipart/form-data">
<table>

<h1 class="post-title">
<label>Title</label>
<input type="text" name="title" class>
</h1>

<div class="post-content">
<label>Body</label>
<textarea name="body" id="body"></textarea>

</div>

<label>Image</label>
<input type="file" name="imageToUpload">

</table>
<button type="submit" name="update-post" class="btn btn-big"> update</button>
<?php 
if (isset($_GET['id'])) {

  $editMessage = $_GET['edit'];
$getID = $_GET['id'];
  
   
    $sql = "UPDATE * FROM posts WHERE id=$id";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetch();


  }


?>

</form>
</div>

</div>
</div>
            
         
            
          </div>
          
        </div>
        
        <?php } ?> 


    


</form>


</div>

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>




