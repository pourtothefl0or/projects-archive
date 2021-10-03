<?php
session_start();
require ('../config/connect.php');

$class = filter_var(trim($_POST['class']), FILTER_SANITIZE_STRING);
$directory = 'images/classes/'.$_FILES['image1']['name'];

// .time().'-'

if (mb_strlen($class) < 1 || mb_strlen($class) > 255) {
    $_SESSION['message2'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-add.php');
} elseif (!move_uploaded_file($_FILES['image1']['tmp_name'], '../'.$directory)) {
    $_SESSION['message2'] = 'Ошибка при загрузке файла';
    header('Location: ../pages/admin-add.php');
} else {
    mysqli_query($connect,"ALTER TABLE `classes` AUTO_INCREMENT = 1");
    mysqli_query($connect,"INSERT INTO `classes` (`class`, `image`) VALUES ('$class', '$directory')");
    $_SESSION['message2'] = 'Добавлено!';
    header('Location: ../pages/admin-add.php');
}
?>