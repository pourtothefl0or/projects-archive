<?php
function sum($id) {
    global $db;
    $sum = mysqli_fetch_array(mysqli_query($db, "SELECT SUM(`checks_sum`) FROM `checks` WHERE `users_id` = '$id'"));
    if($sum[0] != 0) { 
        return $sum[0]; 
    } else { 
        return '0'; 
    }
}
?>