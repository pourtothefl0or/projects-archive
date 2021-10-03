<?php if($_SESSION['message']) {
    echo '<p class="message center">' . $_SESSION['message'] . ' </p>';
    } unset($_SESSION['message']);
?>