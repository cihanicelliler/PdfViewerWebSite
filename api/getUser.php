<?php
header('Content-Type: application/json');
error_reporting(0);
require_once('../sql.php');
session_start();

$id = isset($_POST['id']) ? $_POST['id'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

if ($_GET["getAll"] == 'true') {
    $data['data'] = array();
    $query = "select * from users";
    $result_query = mysqli_query($conn362, $query);
    $rowcount = mysqli_num_rows($result_query);
    while ($row = $result_query->fetch_array()) {
        $data['data'][] = array("id" => $row['Id'], "name" => $row['Name'], "email" => $row['Email'], "password" => $row['Password'], "userType" => $row['UserType']);
    }
    $object = (object)$data;
    echo json_encode($object);

} else if (isset($_POST['id'])) {
    $data['data'] = array();
    $query = "select * from users where Id='$id'";
    $result_query = mysqli_query($conn362, $query);
    $rowcount = mysqli_num_rows($result_query);
    while ($row = $result_query->fetch_array()) {
        $data['data'][] = array("id" => $row['Id'], "name" => $row['Name'], "email" => $row['Email'], "password" => $row['Password'], "userType" => $row['UserType']);
    }
    $object = (object)$data;
    echo json_encode($object);
} else {
    $query = "select * from users where Email='$email' and password='$password'";
    $result_query = mysqli_query($conn362, $query);
    $rowcount = mysqli_num_rows($result_query);
    if ($rowcount != 1) {
        header('HTTP/1.1 500 Internal Server Booboo');
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    } else {
        while ($rows = $result_query->fetch_array()) {
            $name = $rows["Name"];
            $email = $rows["Email"];
            $status = $rows["UserType"];
        }
        $cookie_name = "Loged";
        $cookie_value = $status;
        setcookie($cookie_name, 'mail=' . $email . '&name=' . $name . '&status=' . $status, time() + (86400 * 30), "/");
        die(json_encode(array('message' => 'Success', 'code' => 200)));
    }
}


?>