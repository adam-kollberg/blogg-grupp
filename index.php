<?php include("database/dbconnection.php"); ?>
<?php include("includes/header.php"); ?>


<body>

    <h2>Blog-5<h2>


<a href="<?php echo 'login.php'; ?> " > Login</a>
<br>

<a href="<?php echo 'register.php'; ?>">Registration</a>


<a href="<?php echo 'post.php'; ?>">Post</a>

<?php $stm = $pdo->query("SELECT * FROM posts ");?>
<div class="page-wrapper">


<!-- Post Slider -->
   
      <h1 class="slider-title">Trending Posts</h1>
    
      <?php while ($row = $stm->fetch()) { ?>
      <div class="post-wrapper">
      
        <div class="post">
       
          <img src="<?php echo $row['image']?>  " alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="single.html"><?php echo $row['title']?></a></h4>
            
            <button class ="btn">Read more</button>
            
          </div>
        </div>
        <?php } ?> 


        
        


      </div>

    </div>


    



<?php include("includes/footer.php")?>

