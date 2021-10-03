<?php
session_start();
require ('../config/connect.php');

$id = $_GET['id'];
$product = $_GET['product'];

unlink('../'.$product);

mysqli_query($connect,"ALTER TABLE `books` AUTO_INCREMENT = 1");

mysqli_query($connect,"DELETE FROM `books` WHERE `id` = '$id'");

header('Location: ../pages/admin-edit.php');
?>