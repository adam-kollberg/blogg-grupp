<?php
include("database/dbconnection.php");
include("path.php"); 
include(ROOT_PATH . "/app/includes/header.php"); 

$stm = $pdo->query('SELECT * FROM posts');

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
        <p> <?php echo $row['category']; ?> </p>
          <img src="<?php echo $row['image']?>  " alt="" class="slider-image">
          <div class="post-info">
            <h3><?php echo $row['title'];?></h3>

            
            <p> Created: <?php echo date("y.m.d",strtotime( $row['created'])); ?> </p>
            
            <a href="deletepost.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>

            
            <a href="editpost.php?edit=<?php echo $row['title'] ?>&body=<?php echo $row['body']?>&id=<?php echo $row['id'] ?>" class="edit_btn">Edit</a> 

            
          
          </div>
          
        </div>
        
        <?php } ?> 



    <div class="single-content">


<h2>Add new post</h2>


<div class="single-wrapper">
<div class="single">
<form action="handlepost.php" method="post" enctype="multipart/form-data">
<table>
<h3><label>Title</label></h3>
<input type="text" name="title" class="text-input">
<label for="categories">Choose your category</label>
<select name="categories" id="cars">
<option value="Sunglasses">Sunglasses</option>
<option value="Watches">Watches</option>
<option value="Jewelery">Jewelery</option>
<option value="Interior">Interior</option>
<option value="Clothes">Clothes</option>
</select>
<div class="post-content">
<textarea name="body" id="body" rows="5" cols="40"></textarea>
</div>
<h3><label>Image</label></h3>
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