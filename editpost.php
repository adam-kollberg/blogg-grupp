<?php include("path.php");
include("database/dbconnection.php");


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


<div class="auth-content">

<form action="app/controllers/handleeditpost.php" method="POST">

  <h2 class="form-title">Edit Post</h2>
<div>
<?php 
$id=$_GET['id'];
$sql = "SELECT * FROM posts where id=$id";
  $stm = $pdo->prepare($sql);
  $stm->execute();
  $row=$stm->fetch();?>
<img src="<?php echo $row['image']?>" width="300" height="300">
<label>Change picture</label>
<input type="file" name="image_upload" id="">
</div>
  <div>
    
    <label>Title</label>
    <input type="text" name="title" class="text-input" value="<?php echo $_GET['edit']; ?>">
  </div>
  <div>
    <label>Body</label>
    <textarea rows="20" cols="40" name="body" class="text-input"><?php echo $_GET['body']; ?></textarea>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
  </div>
  <div>
  <label for="categories">Change your category</label>
<select name="categories" id="" value="<?php echo $_GET['category'];?>">
<option value="Sunglasses">Sunglasses</option>
<option value="Watches">Watches</option>
<option value="Jewelery">Jewelery</option>
<option value="Interior">Interior</option>
<option value="Clothes">Clothes</option>
</select>
  </div>
  
  <div>
    <button type="submit" name="submit_edit" class="btn btn-big">Edit post</button>
  </div>
  
</form>

</div>







<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</head>

