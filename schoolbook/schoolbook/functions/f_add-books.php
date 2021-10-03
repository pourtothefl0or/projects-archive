<?php
session_start();
require ('../config/connect.php');

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$class = $_POST['class'];
$subject = $_POST['subject'];
$author = filter_var(trim($_POST['author']), FILTER_SANITIZE_STRING);
$year = $_POST['year'];
$link = filter_var(trim($_POST['link']), FILTER_SANITIZE_STRING);
$directory = 'images/books/'.$_FILES['image2']['name'];

// .time()

if (mb_strlen($class) < 1 || mb_strlen($class) > 255) {
    $_SESSION['message3'] = 'Слишком маленькое или больше название!';
    header('Location: ../pages/admin-add.php');
} elseif (!move_uploaded_file($_FILES['image2']['tmp_name'], '../'.$directory)) {
    $_SESSION['message3'] = 'Файл отсутствует или не загружен!';
    header('Location: ../pages/admin-add.php');
} else {
    mysqli_query($connect,"ALTER TABLE `books` AUTO_INCREMENT = 1");
    mysqli_query($connect,"INSERT INTO `books` (`class`, `subject`, `name`, `author`, `year`, `image`, `link`) VALUES ('$class', '$subject', '$name', '$author', '$year', '$directory', '$link')");
    $_SESSION['message3'] = 'Добавлено!';
    header('Location: ../pages/admin-add.php');
}
?>