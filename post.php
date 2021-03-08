<?php
include("database/dbconnection.php");
include("path.php");
include(ROOT_PATH . "/app/includes/header.php");

$stm = $pdo->query('SELECT * FROM posts');

//$editMessage = $_GET['edit'];
//$getID = $_GET['id'];


    
if(isset($_SESSION['role']) && (($_SESSION['role'] == "user"))) {
  echo "<script>alert('Please log in as admin!'); location.href='index.php';</script>";
  

}
        


    

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/style2.css">
  <title>Newpost</title>
</head>

<body>

  <?php

  $sql = "SELECT * FROM posts";
  $stm = $pdo->prepare($sql);
  $stm->execute();

  ?>
  <section class="post_section">

    <h1 class="slider-title">New Posts</h1>

    <?php while ($row = $stm->fetch()) { ?>
      <div class="post-wrapper">
      <div class="post">
          <p class="category-tag"> <?php echo $row['category']; ?> </p>
          <img src="<?php echo $row['image'] ?>  " alt="" class="slider-image">
          <div class="post-info">
            <h3><?php echo $row['title']; ?></h3>


            <p> Created: <?php echo date("y.m.d", strtotime($row['created'])); ?> </p>

            <a href="editpost.php?edit=<?php echo $row['title'] ?>&body=<?php echo $row['body'] ?>&id=<?php echo $row['id'] ?>&category=<?php echo $row['category'] ?>" class="btn">Edit post</a>
            <a href="app/controllers/deletepost.php?del=<?php echo $row['id']; ?>" class="btn">Delete post</a>






          </div>
          
          
          <h5> Comments</h5>
          <?php
          $post_id = $row['id'];

          $sql = "SELECT * FROM comments WHERE post_id=$post_id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          while ($comments = $stmt->fetch()) { ?>
            <div class="comment-edit">
            <i class="fas fa-comments"></i>
            <p> <?php echo $comments['comment'] ?> </p>
            <a href="app/controllers/handleDeleteComments.php?del=<?php echo $comments['id']; ?>">Delete comment</a>
            </div>
          </div>

        <?php } ?>

        <?php } ?>
          </div>


  

  </section>

  <section class="add_post_section">

     <div class="single-wrapper">
      <h2>Add new post</h2>
      <div class="single">
        <form action="handlepost.php" method="post" enctype="multipart/form-data">
          
            <h3><label>Title</label></h3>
            <input type="text" name="title" class="text-input">
            <h3><label for="categories">Choose your category</label><h3>
            <select name="categories"  class="text-input">
              <option value="Sunglasses">Sunglasses</option>
              <option value="Watches">Watches</option>
              <option value="Jewelery">Jewelery</option>
              <option value="Interior">Interior</option>
              <option value="Clothes">Clothes</option>
            </select>
            <div class="post-content">
            <h3><label>Your text</label></h3>
              <textarea name="body" id="body" rows="20" cols="40" class="text-input"></textarea>
            </div>
            <h3><label>Image</label></h3>
            <div>
            <input type="file" name="imageToUpload" class="btn">
          </div>
          <button type="submit" name="add-post" class="btn btn-big"> Add Post</button>


        </form>
      </div>
    </div>

  </section>


  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>

</html>