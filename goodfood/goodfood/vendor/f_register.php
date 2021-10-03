<?php
require 'connect.php';

$error_fields = [];

$name = $_POST['name_register'];
if ($name === '') {
    $error_fields[] = 'name_register';
}

$email = $_POST['email_register'];
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email_register';
}

$password = $_POST['password_register'];
if ($password === '') {
    $error_fields[] = 'password_register';
}

$password_confirm = $_POST['repeat_register'];
if ($password_confirm === '') {
    $error_fields[] = 'repeat_register';
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

$checkup = mysqli_query($connect, "SELECT * FROM `users`");
while ($user = mysqli_fetch_assoc($checkup)) {
    if ($user['users_email'] === $email) {
        $response = [
            "status" => false,
            "message" => 'Данная почта уже зарегистрировна!'
        ];

        echo json_encode($response);
        die();
    }
}

if ($password != $password_confirm) {
    $response = [
        "status" => false,
        "message" => 'Пароли не совпадают!'
    ];

    echo json_encode($response);
    die();
}

mysqli_query($connect, "INSERT INTO `users` (`users_name`, `users_email`, `users_password`) VALUES ('$name', '$email', '$password')");

$response = [ "status" => true ];
echo json_encode($response);
?>