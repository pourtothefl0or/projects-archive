<?php
session_start();
require('vendor/connect.php');
require('vendor/functions.php');
str_search();

if (!$_SESSION['user']) { header('Location: index.php'); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Профиль</title>
</head>
<body>
<?php require('header.php'); ?>
    <main>
        <section class="profile">
            <div class="container big-container padding-t-b">
                <h2 class="main-title">Мои объявление</h2>
                <ul class="profile-list">
                    <?php $profile = mysqli_query($connect, "SELECT * FROM `products` WHERE `users_id` = '{$_SESSION['user']['id']}'"); foreach($profile as $profile_item) { ?>
                        <li class="profile-list__item"><a href="product.php?id=<?= $profile_item['products_id']; ?>"><?= $profile_item['products_name']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/exit.js"></script>
</body>
</html>