<?php
include("database/dbconnection.php");
include("path.php"); 
include(ROOT_PATH . "/app/includes/header.php"); 

$stm = $pdo->query('SELECT id, title, body, image FROM posts');
//$editMessage = $_GET['edit'];
//$getID = $_GET['id'];

/* session_start();
    if(isset($_SESSION['login_user']) && isset($_SESSION['password']))
    {
        if(isset($_SESSION['role']) && (($_SESSION['role'] == "admin") || ($_SESSION['role'] == "user") ))
        {
           // echo '<script>alert("'. $_SESSION['id'] .'")</script>';
        }
    }
    else
    {
        
        header ('Location: login.php?error=Vänligen logga in');

    } */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/style2.css">
    <title>Newpost</title>
</head>
<body>
<?php $stm = $pdo->query("SELECT * FROM posts");?>
<div class="page-wrapper">

<h1 class="slider-title">New Posts</h1>
    
      <?php while ($row = $stm->fetch()) { ?>
      <div class="post-wrapper">
      
        <div class="post">
        
          <img src="<?php echo $row['image']?>  " alt="" class="slider-image">
          <div class="post-info">
            <h3><?php echo $row['title'];?></h3>

            
            
            <a href="deletepost.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>

            
            <a href="editpost.php?edit=<?php echo $row['id'] ?>&id=<?php echo $row['body'] ?>" class="edit_btn">Edit</a> 
          </div>
          
        </div>
        
        <?php } ?> 



    <div class="single-content">


<h2>Add new post</h2>


<div class="single-wrapper">
<div class="single">
<form action="handlepost.php" method="post" enctype="multipart/form-data">
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
<button type="submit" name="add-post" class="btn btn-big"> Add Post</button>



</form>
</div>

</div>
</div>

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>