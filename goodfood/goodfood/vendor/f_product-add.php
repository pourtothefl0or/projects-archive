<?php
require('connect.php');

$error_fields = [];

$category = $_POST['category_add'];
if ($category === '') {
    $error_fields[] = 'category_add';
}

$name = $_POST['name_add'];
if ($name === '') {
    $error_fields[] = 'name_add';
}

$property1 = $_POST['property1_add'];
if ($property1 === '') {
    $error_fields[] = 'property1_add';
}

$property2 = $_POST['property2_add'];
if ($property1 === '') {
    $error_fields[] = 'property2_add';
}

$property3 = $_POST['property3_add'];
if ($property3 === '') {
    $error_fields[] = 'property3_add';
}

$property4 = $_POST['property4_add'];
if ($property4 === '') {
    $error_fields[] = 'property4_add';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "message" => "Заполните поля ввода!",
        "fields" => $error_fields
    ];

    echo json_encode($response);
    die();
}

$image = 'update/'.time().'-'.$_FILES['image_add']['name'];
if (!move_uploaded_file($_FILES['image_add']['tmp_name'], '../'.$image)) {
    $response = [
        "status" => false,
        "message" => 'Ошибка загрузки изображения!'
    ];

    echo json_encode($response);
    die();
} else {
    mysqli_query($connect, "INSERT INTO `products` (`category_name`, `products_name`, `products_image`, `products_property-1`, `products_property-2`, `products_property-3`, `products_property-4`) VALUES ('$category', '$name', '$image', '$property1', '$property2', '$property3', '$property4')");
    $response = ["status" => true];
    echo json_encode($response);
}
?>