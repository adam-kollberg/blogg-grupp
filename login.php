<?php 

include('app/database/dbconnection.php');




if(isset($_POST['login'])){
$user = $_POST['email'];
$password= $_POST['password'];
$salt = "2626236266AsashÄASASAS";
$password = md5($password.$salt);


$sql = ("SELECT count(id), role FROM users WHERE email=:user_IN AND password=:password_IN");
$stm = $pdo->prepare($sql);
$stm->bindParam("user_IN", $user );
$stm->bindParam("password_IN", $password );
$stm->execute();
$return = $stm->fetch();

if ($return[0] > 0) {
session_start();
$_SESSION['login_user'] = $user;
$_SESSION['password'] = $password;
$_SESSION['role'] = $return['role'];

echo "Välkommen" .  $_SESSION['login_user'] . "du är:" . $_SESSION['role'];

//f ($_SESSION['role'] = $return['admin'];) {

}

} else {
    echo "Something went wrong";
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

</head>
<body>

<form method="post" action="login.php" name="signin-form">
  <div class="form-element">
    <label>Email</label>
    <input type="text" name="email" placeholder = "Your email" required />
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" placeholder = "Your password" required />
    
    
    
  </div>
  <button type="submit" name="login" value="login">Log In</button>
  <button type="submit" name="register" value="register" onclick="window.location.href='register.php'">register</button>
</form>


</body>
</html>