<?php
session_start();
require ('../config/connect.php');

$id = $_GET['id'];

mysqli_query($connect,"ALTER TABLE `help` AUTO_INCREMENT = 1");

mysqli_query($connect,"DELETE FROM `help` WHERE `id` = '$id'");

header('Location: ../pages/admin-mod.php');
?>