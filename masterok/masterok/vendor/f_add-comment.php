<?php
session_start();
require('connect.php');

$id = $_POST['id'];
$comment = $_POST['comment'];
$error_fields = [];

if ($comment === '') { 
    $error_fields[] = 'comment'; 
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "message" => "Заполните поля ввода!",
        "fields" => $error_fields
    ];

    echo json_encode($response);
    die();
}

mysqli_query($connect, "INSERT INTO `comments` (`products_id`, `users_name`, `comments_desc`) VALUES ('$id', '{$_SESSION['user']['username']}', '$comment')");
$response = ["status" => true];
echo json_encode($response);
?>