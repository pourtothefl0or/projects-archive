<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'root', 'goodfood_project');

mysqli_query($connect,"ALTER TABLE `users` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `category` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `products` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `favorite` AUTO_INCREMENT = 1");
?>