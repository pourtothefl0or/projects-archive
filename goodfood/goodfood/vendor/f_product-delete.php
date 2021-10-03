<?php
require('connect.php');

$product_id = $_POST['product_id'];

$image = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.`products_id` = '$product_id'"));
unlink('../'.$image['products_image']);

mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`products_id` = '$product_id'");
?>