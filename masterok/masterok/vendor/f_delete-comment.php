<?php
session_start();
require('connect.php');
mysqli_query($connect, "DELETE FROM `comments` WHERE `comments`.`comments_id` = '{$_POST['id']}'");
$response = ["status" => true];
echo json_encode($response);
?>