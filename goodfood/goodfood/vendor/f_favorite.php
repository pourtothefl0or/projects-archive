<?php
require('connect.php');

$id_user = $_SESSION['user']['id'];
$id_favorite = $_POST['id_favorite'];

$checkup = mysqli_query($connect, "SELECT * FROM `favorite` WHERE `users_id` = '$id_user' AND `products_id` = '$id_favorite'");
if (mysqli_num_rows($checkup) > 0) {
    /* -- DELETE -- */
    mysqli_query($connect, "DELETE FROM `favorite` WHERE `users_id` = '$id_user' AND `products_id` = '$id_favorite'");

    $response = [ "status" => false ];
    echo json_encode($response);
} else {
    /* -- ADD -- */
    mysqli_query($connect, "INSERT INTO `favorite` (`users_id`, `products_id`) VALUES ('$id_user', '$id_favorite')");

    $response = [ "status" => true ];
    echo json_encode($response);
}
?>