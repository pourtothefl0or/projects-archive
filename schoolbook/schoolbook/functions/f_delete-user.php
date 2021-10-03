<?php
session_start();
require ('../config/connect.php');

$id = $_GET['id'];

mysqli_query($connect,"ALTER TABLE `users` AUTO_INCREMENT = 1");

mysqli_query($connect,"DELETE FROM `users` WHERE `id` = '$id'");

require ('f_logout.php');
?>