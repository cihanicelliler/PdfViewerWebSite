<?php
require_once('../sql.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$userType = isset($_POST['userType']) ? $_POST['userType']:"Normal";

$query = "INSERT INTO users (Email,Name,Password,UserType) VALUES('$email','$name','$password','$userType')";
$result_query=mysqli_query($conn362,$query);


?>