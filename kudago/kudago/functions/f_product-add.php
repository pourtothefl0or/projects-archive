<?php
session_start();
require 'connect.php';

$category = $_POST['add_category'];
$name = $_POST['add_name'];
$adress = $_POST['add_adress'];
$tel = $_POST['add_tel'];
$price = $_POST['add_price'];
$image = 'database/'.time().'-'.$_FILES['add_image']['name'];
$error_fields = [];

/* -- EMPTY -- */
if ($category === '') { $error_fields[] = 'add_category'; }
if ($name === '') { $error_fields[] = 'add_name'; }
if ($adress === '') { $error_fields[] = 'add_adress'; }
if ($tel === '') { $error_fields[] = 'add_tel'; }
if ($price === '') { $error_fields[] = 'add_price'; }

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "message" => "Заполните поля ввода!",
        "fields" => $error_fields
    ];

    echo json_encode($response);
    die();
}
/* -- /EMPTY -- */

/* -- ADD -- */
if (!move_uploaded_file($_FILES['add_image']['tmp_name'], '../'.$image)) {
    $response = ["status" => false, "message" => 'Ошибка загрузки изображения!'];
    echo json_encode($response);
    die();
} else {
    mysqli_query($connect, "INSERT INTO `products` (`category_name`, `products_name`, `products_adress`, `products_tel`, `products_price`, `products_image`) VALUES ('$category', '$name', '$adress', '$tel', '$price', '$image')");
    
    $response = ["status" => true];
    echo json_encode($response);
}
/* -- /ADD -- */
?>