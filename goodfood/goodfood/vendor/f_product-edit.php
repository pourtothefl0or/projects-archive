<?php
require('connect.php');

$product_id = $_POST['id_edit'];

$category = $_POST['category_edit'];
$name = $_POST['name_edit'];
$property1 = $_POST['property1_edit'];
$property2 = $_POST['property2_edit'];
$property3 = $_POST['property3_edit'];
$property4 = $_POST['property4_edit'];
$image = 'update/'.time().'-'.$_FILES['image_edit']['name'];

if (move_uploaded_file($_FILES['image_edit']['tmp_name'], '../'.$image)) {
    $checkup = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.`products_id` = '$product_id'"));
    unlink('../'.$checkup['products_image']);

    mysqli_query($connect, "UPDATE `products` SET `products_image` = '$image' WHERE `products`.`products_id` = '$product_id'");
}

mysqli_query($connect, "UPDATE `products` SET `category_name` = '$category', `products_name` = '$name', `products_property-1` = '$property1', `products_property-2` = '$property2', `products_property-3` = '$property3', `products_property-4` = '$property4' WHERE `products`.`products_id` = '$product_id'");

$response = ["status" => true];
echo json_encode($response);
?>