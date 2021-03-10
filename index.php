<?php
include("database/dbconnection.php");
include("path.php");



?>



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/style2.css">

  <title>Blog</title>
</head>

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>



<body>



  <?php $stm = $pdo->query("SELECT * FROM posts"); ?>
  <div class="page-wrapper">

    <div class="hero">
      <h1 class="hero-heading"> WELCOME TO MILLHOUSE, THE BLOG</h1>
      <p class=hero-subheading>We are looking for better customer relations
        please feel free to comment on our blog posts!
      </p>

    </div>


    <!-- Post Slider -->

    <h1 class="slider-title">New Posts</h1>
    <div class="post-wrapper-start">
      <?php while ($row = $stm->fetch()) { ?>

        <div class="post">
          <p class="category-tag"> <?php echo $row['category']; ?> </p>
          <img src="<?php echo $row['image'] ?>  " alt="" class="slider-image">
          <div class="post-info">
            <h3><?php echo $row['title']; ?></h3>

            <a href="single-post.php?id=<?php echo $row['id']; ?>">Read More</a>

          </div>

        </div>

      <?php } ?>





    </div>

  </div>
  </div>







  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


</body>

</html>