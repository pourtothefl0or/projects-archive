<?php
session_start();
require 'connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$error_fields = [];

/* -- Empty fields -- */
if ($login === '') { $error_fields[] = 'login'; }
if ($password === '') { $error_fields[] = 'password'; }

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "message" => "Заполните поля ввода!",
        "fields" => $error_fields
    ];

    echo json_encode($response);
    die();
}

$query = "SELECT * FROM `users` WHERE `users_login` = '$login' AND `users_password` = '$password'";
$check_user = mysqli_query($connect, $query);

if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user'] = [
        'id' => $user['users_id'],
        'login' => $user['users_login']
    ];

    $response = ["status" => true];
    echo json_encode($response);
} else {
    $response = ["status" => false, "message" => 'Проверьте вводимые данные!'];
    echo json_encode($response);
}
?>