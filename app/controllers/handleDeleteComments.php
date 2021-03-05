<?php if (isset($_GET['del'])) {
include('../../path.php');
include(ROOT_PATH . '/database/dbconnection.php');
$deleteID = $_GET['del'];

$sql = "DELETE FROM comments WHERE id=$deleteID";
$stm = $pdo->prepare($sql);
if ($stm->execute()) {
    header("location:" . BASE_URL . "/post.php");
}
}
?>