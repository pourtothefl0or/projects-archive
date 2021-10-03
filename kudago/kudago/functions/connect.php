<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'kudago');

mysqli_query($connect,"ALTER TABLE `users` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `category` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `products` AUTO_INCREMENT = 1");
?>