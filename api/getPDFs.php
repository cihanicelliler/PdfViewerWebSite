<?php
header('Content-Type: application/json');
error_reporting(0);
require_once('../sql.php');

$email = "";
if (isset($_COOKIE["Loged"])) {
    $email = explode("=", $_COOKIE["Loged"]);
    $email = str_replace('&name', '', $email[1]);
}
if (isset($_COOKIE["Loged"])) {
    $status = explode("=", $_COOKIE["Loged"]);
}
$data['data'] = array();
if ($status[3] == "Admin") {
    $query = "select * from pdfs";
} else {
    $query = "select * from pdfs where Email='$email'";
}

$result_query = mysqli_query($conn362, $query);
$rowcount = mysqli_num_rows($result_query);
while ($row = $result_query->fetch_array()) {
    $data['data'][] = array("name" => $row['Name'], "surname" => $row['Surname'], "student_no" => $row['Student_No'], "lesson_name" => $row['Lesson_Name'], 'keywords' => $row['Keywords'], "date" => $row['Date'], "title" => $row['Title'], "supervisor" => $row['Supervisor'], "jury_member" => $row['Jury_Member'], "jury_member2" => $row['Jury_Member2'], "summary" => $row['Summary']);
}
$object = (object)$data;
echo json_encode($object);


?>