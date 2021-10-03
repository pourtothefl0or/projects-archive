<?php
if ($card['cards_month'] < 10) {
    echo '0'.$card['cards_month'].'/'.$card['cards_year'];
} else {
    echo $card['cards_month'].'/'.$card['cards_year'];
}
?>