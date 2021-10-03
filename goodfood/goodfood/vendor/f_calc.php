<?php
session_start();

$error_fields = [];

$sex = $_POST['sex_calc'];
if ($sex === '') {
    $error_fields[] = 'sex_calc';
}

$height = $_POST['height_calc'];
if ($height === '') {
    $error_fields[] = 'height_calc';
}

$weight = $_POST['weight_calc'];
if ($weight === '') {
    $error_fields[] = 'weight_calc';
}

$age = $_POST['age_calc'];
if ($age === '') {
    $error_fields[] = 'age_calc';
}

$load = $_POST['load_calc'];
if ($load === '') {
    $error_fields[] = 'load_calc';
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

if ($load == 1) { // 1
    $load = 1.2;
} elseif ($load == 2) { // 2
    $load = 1.375;
} elseif ($load == 3) { // 3
    $load = 1.55;
} elseif ($load == 4) { // 4
    $load = 1.725;
} elseif ($load == 5) { // 5
    $load = 1.9;
}

if ($sex == 1) { // 1
    $calc = (88.36 + (13.4 * $weight) + (4.8 * $height) - (5.7 * $age)) * $load;
} elseif ($sex == 2) { // 2
    $calc = (447.6 + (9.2 * $weight) + (3.1 * $height) - (4.3 * $age)) * $load;
}

$response = [
    "status" => true,
    "message" => "Ваша норма: ".round($calc)."кк."
];

echo json_encode($response);
?>