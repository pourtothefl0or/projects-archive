<?php
session_start();
require ('../config/connect.php');

$id_product = $_GET['id'];

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$flag = filter_var(trim($_POST['flag']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$query = mysqli_query($connect, "UPDATE `users` SET `id` = '$id', `flag` = '$flag', `name` = '$name', `email` = '$email', `password` = '$password' WHERE `users`.`id` = '$id_product'");

if (!$query) {
    $_SESSION['message'] = 'Ошибка редактирования!';
}

header('Location: ../pages/admin-mod.php');
?>