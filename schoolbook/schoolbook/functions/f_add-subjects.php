<?php
session_start();
require ('../config/connect.php');

$subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);

if (mb_strlen($subject) < 2 || mb_strlen($subject) > 255) {
    $_SESSION['message1'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-add.php');
} else {
    mysqli_query($connect,"ALTER TABLE `subjects` AUTO_INCREMENT = 1");
    mysqli_query($connect,"INSERT INTO `subjects` (`subject`) VALUES ('$subject')");
    $_SESSION['message1'] = 'Добавлено!';
    header('Location: ../pages/admin-add.php');
}
?>