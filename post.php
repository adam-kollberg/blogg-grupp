<?php
session_start();
    if(isset($_SESSION['login_user']) && isset($_SESSION['password']))
    {
        if(isset($_SESSION['role']) && (($_SESSION['role'] == "admin") || ($_SESSION['role'] == "user") ))
        {
            echo '<script>alert("'. $_SESSION['id'] .'")</script>';
        }
    }
    else
    {
        //echo '<script>alert("Du är  inte inloggad!")</script>';
        header ('Location: login.php?error=Vänligen logga in');

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Enter posts -->





    


<h2>Add new post</h2>

<form action="handlepost.php" method="post" enctype="multipart/form-data">
<table>

<label>Title</label>
<input type="text" name="title" class>


<label>Body</label>
<textarea name="body" id="body"></textarea>

<label>Image</label>
<input type="file" name="imageToUpload">

</table>
<button type="submit" name="add-post" class="btn btn-big"> Add Post</button>
</form>

</body>
</html>