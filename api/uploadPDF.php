<?php
$files = array();
$uploadDirectory = "\\cihan\\pdf\\";

$errors = []; // Store errors here
if (isset($_FILES)) {
    foreach ($_FILES as $file) {
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory . basename($fileName);

        if ($fileSize > 4000000) {
            $errors[] = "File exceeds maximum size (4MB)";
        }
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) {
                echo basename($fileName);
            } else {
                echo "An error occurred. Please contact the administrator.";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
}