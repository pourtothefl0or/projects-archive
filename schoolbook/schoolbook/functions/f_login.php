<?php
session_start();
require ('../config/connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "flag" => $user['flag'],
        "name" => $user['name'],
        "email" => $user['email']
    ];
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../pages/login.php');
}
?>