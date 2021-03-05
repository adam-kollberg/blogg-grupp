<?php include("path.php"); 
include("database/dbconnection.php");
?>


<?php 
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
        <div class="single">
        <img src="<?php echo BASE_URL . "/". $result['image']?>" alt="" width="500" height="500">
        <h1 class="post-title"><?php echo $result['title']; ?></h1>

          <div class="post-content">
            <?php echo ($result['body']); ?>
          </div>

        </div>
      </div>

    </div>

    <div class="auth-content" id="comment-div"> <?php if(!isset($_SESSION['login_user'])){
      ?> <style> #comment-div{display:none;} </style> <?php } ?>
    
    <form action="handlecomment.php" method="POST">
    <h2 class="form-title">Comments</h2>

    <?php  
 
    $post_id = $_GET['id'];
    $sql = "SELECT * FROM comments
    LEFT JOIN users ON comments.user_id=users.id
    LEFT JOIN posts ON comments.post_id=posts.id WHERE posts.id=$post_id";
    
    
    $stm = $pdo->prepare($sql);
    $stm->execute();
    
    ?>


<?php while ($row = $stm->fetch()) { ?> 
<div class="comments-wrapper">

<div class="comments">
<i class="fas fa-comments"></i>
<h6><?php echo $row['name'];?></h6>
<p class ="comment"><?php echo $row['comment'];?></hp>

</div>

   
    </div>

    <?php } ?>


</div>


    <div class="auth-content" id="comment-div2"> <?php if(!isset($_SESSION['login_user'])){
      ?> <style> #comment-div2{display:none;} </style> <?php } ?>
    <form action="handlecomment.php" method="POST">
    <h2 class="form-title">Write your comment</h2>



<div>
  <label>Your comment</label>
  <textarea name="comment" rows="5" cols="40" class="text-input"></textarea>
  <input type="hidden" name="id" value="<?php echo $result['id'];?>">
  
</div>
<div>
  <button type="submit" name="comment-submit" class="btn btn-big">Send comment</button>
</div>

</form>


</div>

<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>