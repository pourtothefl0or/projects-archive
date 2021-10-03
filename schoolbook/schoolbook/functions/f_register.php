<?php
session_start();
require ('../config/connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password === $password_repeat) {
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
    $user = mysqli_fetch_assoc($check_user);
    if ($user['email'] == $email){
        $_SESSION['message'] = 'Ошибка!';
        header('Location: ../pages/register.php');
        die();
    }

    mysqli_query($connect,"ALTER TABLE `users` AUTO_INCREMENT = 1");

    mysqli_query($connect, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../pages/login.php');

} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../pages/register.php');
}
?>