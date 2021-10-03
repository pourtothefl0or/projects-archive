<?php
session_start();
require ('../config/connect.php');

$id_product = $_GET['id'];

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);

if (mb_strlen($id) > 255) {
    $_SESSION['message1'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (mb_strlen($subject) > 255) {
    $_SESSION['message1'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
}

$query = mysqli_query($connect, "UPDATE `subjects` SET `id` = '$id', `subject` = '$subject' WHERE `subjects`.`id` = '$id_product'");

if (!$query) {
    $_SESSION['message1'] = 'Ошибка редактирования!';
}

header('Location: ../pages/admin-edit.php');
?>