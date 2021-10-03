<?php
session_start();
require('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];
$error_fields = [];

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { 
    $error_fields[] = 'email'; 
}

if ($password === '') { 
    $error_fields[] = 'password';
}

if (!empty($error_fields)) {
    $response = [ "status" => false, "type" => 1, "message" => "Заполните поля ввода!", "fields" => $error_fields ];

    echo json_encode($response);
    die();
}

$users = mysqli_query($connect, "SELECT * FROM `users` WHERE `users_email` = '$email' AND `users_password` = '$password'");
if (mysqli_num_rows($users) > 0) {
    $user = mysqli_fetch_assoc($users);

    $_SESSION['user'] = [
        'id' => $user['users_id'],
        'username' => $user['users_name'],
        'email' => $user['users_email'],
        'flag' => $user['users_flag']
    ];

    $response = ["status" => true];
    echo json_encode($response);
} else {
    $response = ["status" => false, "message" => 'Проверьте вводимые данные!'];
    echo json_encode($response);
}
?>