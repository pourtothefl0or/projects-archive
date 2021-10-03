<?php
session_start();
require ('../config/connect.php');

$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

mysqli_query($connect,"ALTER TABLE `help` AUTO_INCREMENT = 1");
mysqli_query($connect,"INSERT INTO `help` (`email`) VALUES ('$email')");
header('Location: /index.php');
?>