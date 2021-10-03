<?php
$сardnumber = $card['cards_number'];
$сardnumber = str_split($сardnumber, 4);
$сardnumber = implode(" ", $сardnumber);
echo $сardnumber;
?>