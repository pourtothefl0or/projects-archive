<?php
session_start();
require ('../config/connect.php');

$id_product = $_SESSION['user']['id'];

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password_repeat = filter_var(trim($_POST['password_repeat']), FILTER_SANITIZE_STRING);

if ($password === $password_repeat) {
    $query = mysqli_query($connect, "UPDATE `users` SET `name` = '$name', `email` = '$email', `password` = '$password' WHERE `users`.`id` = '$id_product'");
    $_SESSION['message'] = 'Профиль изменён';
} elseif ($name != NULL) {
    mysqli_query($connect, "UPDATE `users` SET `name` = '$name' WHERE `users`.`id` = '$id_product'");
    $_SESSION['message'] = 'Профиль изменён';
} else {
    $_SESSION['message'] = 'Ошибка редактирования!';
}

header('Location: ../pages/profile.php');
?>