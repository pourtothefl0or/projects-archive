<?php
$db = mysqli_connect('localhost','root','root','babank');

mysqli_query($db,"ALTER TABLE `users` AUTO_INCREMENT = 1");
mysqli_query($db,"ALTER TABLE `cards` AUTO_INCREMENT = 1");
mysqli_query($db,"ALTER TABLE `checks` AUTO_INCREMENT = 1");
?>