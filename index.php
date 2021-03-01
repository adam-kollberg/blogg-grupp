<?php include("path.php"); ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog5</title>
</head>
<body>

    <h2>Blog-5<h2>



<a href="<?php echo 'login.php'; ?> " > Login</a>
<br>

<a href="<?php echo 'register.php'; ?>">Registration</a>


<a href="<?php echo 'post.php'; ?>">Post</a>




<?php
session_start();
if(isset($_SESSION['login_user']) && ($_SESSION['password'])){

    echo " Välkommen " . $_SESSION['login_user'] ."" ;

    if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
echo " du är inloggad admin";

    }
    echo '<a href="logout.php">Logga ut!</a>';
    die();
}
?>

</body>
</html>