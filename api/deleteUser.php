<?php
require_once('../sql.php');

$id = $_POST['id'];

$query = "Delete from users Where Id='$id' LIMIT 1";
$result_query=mysqli_query($conn362,$query);

?>