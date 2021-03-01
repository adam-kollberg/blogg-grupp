<?php

include('database/dbconnection.php');



if (isset($_POST['login'])) {
  $user = $_POST['email'];
  $password = $_POST['password'];
  $salt = "2626236266AsashÄASASAS";
  $password = md5($password . $salt);


  $sql = ("SELECT count(id), role, id FROM users WHERE email=:user_IN AND password=:password_IN");
  $stm = $pdo->prepare($sql);
  $stm->bindParam("user_IN", $user);
  $stm->bindParam("password_IN", $password);
  $stm->execute();
  $return = $stm->fetch();



  if ($return[0] > 0) {

    session_start();
    $_SESSION['login_user'] = $user;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $return['role'];
    $_SESSION['id'] = $return['id'];
    


    header("location:index.php");

    //fheader ($_SESSION['role'] = $return['admin'];) {

  }
}



//}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="assets/style2.css">

</head>

<body>

<div class="auth-content">

<form action="login.php" method="post">
  <h2 class="form-title">Login</h2>

  <div>
    <label>Email</label>
    <input type="text" name="email" class="text-input">
  </div>
  <div>
    <label>Password</label>
    <input type="password" name="password" class="text-input">
  </div>
  <div>
    <button type="submit" name="login" class="btn btn-big">Login</button>
  </div>
  <p>Or <a href="register.php">Sign Up</a></p>
</form>

</div>
















</body>

</html>