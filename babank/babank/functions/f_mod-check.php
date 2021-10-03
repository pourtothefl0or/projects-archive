<?php
session_start();
require ('config.php');

$id = $_SESSION['user']['id'];

$card = $_POST['card'];
$product = $_POST['checks_product'];
$date = $_POST['date'];
$time = $_POST['time'];
$sum = $_POST['sum'];

$add = $_POST['add'];

if (isset($add)) {
    // Добавление
    $query = "INSERT INTO `checks` (`cards_id`, `users_id`, `checks_product`, `checks_sum`, `checks_date`, `checks_time`) VALUES ('$card', '$id', '$product', '$sum', '$date', '$time')";
    mysqli_query($db, $query);
    header ('Location: ../index.php');
}
?>