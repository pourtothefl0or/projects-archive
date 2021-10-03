<?php
session_start();
require ('../config/connect.php');

$id_product = $_GET['id'];

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);;
$class = filter_var(trim($_POST['class']), FILTER_SANITIZE_STRING);;
$subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);;
$author = filter_var(trim($_POST['author']), FILTER_SANITIZE_STRING);;
$year = filter_var(trim($_POST['year']), FILTER_SANITIZE_STRING);;
$link = filter_var(trim($_POST['link']), FILTER_SANITIZE_STRING);;
$directory = 'images/books/'.$_FILES['image']['name'];

// .time().'-'

if (mb_strlen($id) < 1 || mb_strlen($id) > 255) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (mb_strlen($name) > 255) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (mb_strlen($class) > 255) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (mb_strlen($subject) > 255) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (mb_strlen($author) > 255) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
} elseif (mb_strlen($link) > 500) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-edit.php');
}

if (!move_uploaded_file($_FILES['image']['tmp_name'], '../'.$directory)) {
    $_SESSION['message3'] = 'Файл отсутствует или не загружен';
    mysqli_query($connect,"UPDATE `books` SET `id` = '$id', `name` = '$name', `class` = '$class', `subject` = '$subject', `author` = '$author', `year` = '$year', `link` = '$link' WHERE `books`.`id` = '$id_product'");
    header('Location: ../pages/admin-edit.php');
} else {
    mysqli_query($connect,"ALTER TABLE `books` AUTO_INCREMENT = 1");
    mysqli_query($connect,"UPDATE `books` SET `id` = '$id', `name` = '$name', `class` = '$class', `subject` = '$subject', `author` = '$author', `year` = '$year', `image` = '$directory', `link` = '$link' WHERE `books`.`id` = '$id_product'");
    $_SESSION['message3'] = 'Добавлено!';
    header('Location: ../pages/admin-edit.php');
}
?>