<?php
require('connect.php');

$error_fields = [];

$email = $_POST['email_login'];
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

$password = $_POST['password_login'];
if ($password === '') {
    $error_fields[] = 'password_login';
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

$checkup = mysqli_query($connect, "SELECT * FROM `users` WHERE `users_email` = '$email' AND `users_password` = '$password'");
if (mysqli_num_rows($checkup) > 0) {
    $user = mysqli_fetch_assoc($checkup);
    $_SESSION['user'] = [
        'id' => $user['users_id'],
        'name' => $user['users_name'],
        'email' => $user['users_email'],
        'flag' => $user['users_flag']
    ];

    $response = ["status" => true];
    echo json_encode($response);
} else {
    $response = [
        "status" => false,
        "message" => 'Проверьте вводимые данные!'
    ];
    echo json_encode($response);
}
?>