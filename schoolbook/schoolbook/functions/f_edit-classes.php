<?php
session_start();
require ('../config/connect.php');

$id_product = $_GET['id'];

$id = $_POST['id'];
$class = filter_var(trim($_POST['class']), FILTER_SANITIZE_STRING);
$directory = 'images/classes/'.$_FILES['image']['name'];

// .time().'-'

if (mb_strlen($class) > 255) {
    $_SESSION['message2'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (!move_uploaded_file($_FILES['image']['tmp_name'], '../'.$directory)) {
    $_SESSION['message2'] = 'Файл отсутствует или не загружен!';
    mysqli_query($connect, "UPDATE `classes` SET `id` = '$id', `class` = '$class' WHERE `classes`.`id` = '$id_product'");
    header('Location: ../pages/admin-edit.php');
} else {
    mysqli_query($connect,"ALTER TABLE `classes` AUTO_INCREMENT = 1");
    mysqli_query($connect, "UPDATE `classes` SET `id` = '$id', `class` = '$class', `image` = '$directory' WHERE `classes`.`id` = '$id_product'");
    $_SESSION['message2'] = 'Добавлено!';
    header('Location: ../pages/admin-edit.php');
}
?>