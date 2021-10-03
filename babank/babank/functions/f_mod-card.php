<?php
session_start();
require ('config.php');

$id = $_SESSION['user']['id'];
$card = $_GET['card'];

$number = $_POST['number'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$month = $_POST['month'];
$year = $_POST['year'];
$cvc = $_POST['cvc'];

if (isset($_POST['add'])) {
    // Название карты
    if ($number != '') {
        $first_nubmer = substr($number,0,1); // Первый символ
        if($first_nubmer == 2) {
            $name = "МИР";
            $image = "images/cards/mir.svg";
        } elseif($first_nubmer == 3) {
            $name = "American Express";
            $image = "images/cards/amex.svg";
        } elseif($first_nubmer == 4) {
            $name = "VISA";
            $image = "images/cards/visa.svg";
        } elseif($first_nubmer == 5) {
            $name = "MasterCard";
            $image = "images/cards/master.svg";
        } elseif($first_nubmer == 6) {
            $name = "Maestro";
            $image = "images/cards/maestro.svg";
        } else {
            header ('Location: ../add-card.php');
            $_SESSION['error'] = 'Неизвестный номер карты, проверьте вводимые данные!';
            die();
        }
    }

    // Добавление
    $query = "INSERT INTO `cards` (`users_id`, `cards_name`, `cards_number`, `cards_firstname`, `cards_lastname`, `cards_month`, `cards_year`, `cards_cvc`, `cards_image`) VALUES ('$id', '$name', '$number', '$first_name', '$last_name', '$month', '$year', '$cvc', '$image')";
    mysqli_query($db, $query);
    header ('Location: ../index.php');
}

if (isset($_POST['delete'])) {
    $query = "DELETE FROM `cards` WHERE `cards`.`cards_id` = '$card'";
    mysqli_query($db, $query);
    header ('Location: ../index.php');
}
?>