<?php
session_start();
require('connect.php');

$id = $_POST['id'];

$delete_image = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.`products_id` = '$id'"));
unlink('../'.$delete_image['products_image']);

mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`products_id` = '$id'");
$response = ["status" => true];
echo json_encode($response);
?>