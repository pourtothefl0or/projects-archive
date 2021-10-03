<?php
session_start();
require('connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$error_fields = [];
if ($name === '') { 
    $error_fields[] = 'name';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($telephone === '') { 
    $error_fields[] = 'telephone';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if (!empty($error_fields)) {
    $response = [ "status" => false, "type" => 1, "message" => "Заполните поля ввода!", "fields" => $error_fields ];
    echo json_encode($response);
    die();
}

$users = mysqli_query($connect, "SELECT * FROM `users`");
while ($user = mysqli_fetch_assoc($users)) {
    if ($user['users_email'] === $email) {
        $response = [ "status" => false, "message" => 'Данная почта уже зарегистрировна!' ];
        echo json_encode($response);
        die();
    }

    if ($user['users_tel'] === $telephone) {
        $response = [ "status" => false, "message" => 'Данная телефон уже зарегистрирован!' ];
        echo json_encode($response);
        die();
    }
}

if ($password != $password_confirm) {
    $response = [ "status" => false, "message" => 'Пароли не совпадают!' ];
    echo json_encode($response);
    die();
}

mysqli_query($connect, "INSERT INTO `users` (`users_name`, `users_email`, `users_telephone`, `users_password`) VALUES ('$name', '$email', '$telephone', '$password')");

$response = [ "status" => true ];
echo json_encode($response);
?>