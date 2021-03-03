

<?php 


include("database/dbconnection.php");


if (isset($_POST['register-btn'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$salt = "2626236266AsashÄASASAS";
$password = md5($password.$salt);

$sql = ("SELECT * from users WHERE email=:email_IN");
$stm = $pdo->prepare($sql);
$stm->bindParam("email_IN", $email);
$stm->execute();



  if ($stm->rowCount() > 0 ) {
  echo '<p class="error">The email address is already registered!</p>';
  }



if ($stm->rowCount() == 0) {
    $sql = "INSERT into users (name, email, password) VALUES(:name_IN, :email_IN, :password_IN)";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':name_IN', $name);
    $stm->bindParam(':email_IN', $email);
    $stm->bindParam(':password_IN', $password);

   if ($stm->execute()) {
  header ("location:login.php");
  
   } else {
   
echo '<p class="error">Something went wrong!</p>';

   }

}


}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="assets/style2.css">
</head>
<body>


<div class="auth-content">
<form action="register.php" method="post">
      <h2 class="form-title">Register</h2>

 <div>
        <label>Name:</label>
        <input type="text" name="name" class="text-input" placeholder = "Full name" require />
      </div>
      <div>
        <label>Email:</label>
        <input type="email" name="email"  class="text-input" placeholder="Your email" require/>
      </div>
      <div>
        <label>Password:</label>
        <input type="password" name="password"  class="text-input" placeholder="Choose your password" require/>
      </div>
      
      <div>
        <input type="submit" name="register-btn" class="btn btn-big" value="Register"></input>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>

  <?php  if (isset($_POST['register-btn'])) {
   //header ("location:index.php");
   Echo "You have been registred" . "<br>" . "<a class ='register-login' href='login.php'>Go to login</a>";
   }  
   
   ?>
    </form>

  </div>
  </div>









</body>
</html>