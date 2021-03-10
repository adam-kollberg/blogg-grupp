
<?php 
session_start(); 
?>
<header>

<div class="logo">
      <h2 class="logo-text">Mill<span>house</span></h2>
      
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      
      <li>
        <a href="#">
          <i class="fa fa-user"></i>
          <?php if (isset($_SESSION['login_user']))
          echo $_SESSION['login_user'] ?>
          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a>
        <ul>
        <?php if (isset($_SESSION['login_user']) && ($_SESSION['role'] == "admin")) {
       echo "<li><a href='post.php'>Admin</a></li>"; 
    
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