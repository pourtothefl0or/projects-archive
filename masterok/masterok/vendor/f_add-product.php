<?php
session_start();
require('connect.php');

$id = $_SESSION['user']['id'];
$city = $_POST['city'];
$category = $_POST['category'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$image = 'updates/'.time().'-'.$_FILES['image']['name'];
$number = $_POST['number'];
$whatsapp = $_POST['whatsapp'];
$telegram = $_POST['telegram'];
$viber = $_POST['viber'];
$error_fields = [];

if ($city === '') { 
    $error_fields[] = 'city'; 
}

if ($category === '') { 
    $error_fields[] = 'category'; 
}

if ($name === '') { 
    $error_fields[] = 'name'; 
}

if ($desc === '') { 
    $error_fields[] = 'desc'; 
}

if ($number === '') { 
    $error_fields[] = 'number'; 
}

if ($whatsapp === '') { 
    $error_fields[] = 'whatsapp'; 
}

if ($telegram === '') { 
    $error_fields[] = 'telegram'; 
}

if ($viber === '') { 
    $error_fields[] = 'viber'; 
}

if (!empty($error_fields)) {
    $response = [ "status" => false, "type" => 1, "message" => "Заполните поля ввода!", "fields" => $error_fields ];

    echo json_encode($response);
    die();
}

if (!move_uploaded_file($_FILES['image']['tmp_name'], '../'.$image)) {
    $response = ["status" => false, "message" => 'Ошибка загрузки изображения!'];
    echo json_encode($response);
    die();
} else {
    mysqli_query($connect, "INSERT INTO `products` (`users_id`, `cities_name`, `categories_name`, `products_name`, `products_desc`, `products_image`, `products_number`, `products_whatsapp`, `products_telegram`, `products_viber`) VALUES ('$id', '$city', '$category', '$name', '$desc', '$image', '$number', '$whatsapp', '$telegram', '$viber')");
    $response = ["status" => true];
    echo json_encode($response);
}
?>