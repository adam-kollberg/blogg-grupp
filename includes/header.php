
<?php session_start(); ?>


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
  <link rel="stylesheet" href="assets/style.css">

  <title>Blog</title>
</head>




<header>

<?php echo '<script>alert("'. $_SESSION['role'] .'")</script>';?>
    <div class="logo">
      <h1 class="logo-text"><span>COOL </span>BLOGG</h1>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <!-- <li><a href="#">Sign Up</a></li>
      <li><a href="#">Login</a></li> -->
      <li>
        <a href="#">
          <i class="fa fa-user"></i>
          <?php if (isset($_SESSION['login_user']))
          echo $_SESSION['login_user'] ?>
          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
        <ul>
        <?php if (isset($_SESSION['login_user']) && ($_SESSION['role'] == "admin")) {
       echo "<li><a href='post.php'>Add new post</a></li>"; 
    
    }else {
        echo "";
    }
            
        

     
        
        
        ?>

          <?php if (isset($_SESSION['login_user'])) {
          echo "<li> <a href='logout.php' class='logout'>Logout</a></li>";
          }
          else {
            echo "<li> <a href='login.php' class='logout'>Login</a></li>";
          }
          
          ?>
          
        </ul>
      </li>
    </ul>
  </header>