<?php
$connect = mysqli_connect('127.0.0.1', 'root', 'root', 'schoolbook');

if (!$connect) {
    die("Не удалось подкючиться к базе данных!");
}

mysqli_query($connect,"ALTER TABLE `classes` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `subjects` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `books` AUTO_INCREMENT = 1");
?>