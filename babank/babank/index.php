<?php
session_start();
require ('functions/config.php');
require ('functions/f_sum.php');

$id = $_SESSION['user']['id'];
$cards = mysqli_query($db, "SELECT * FROM `cards` WHERE `users_id` = '$id' ORDER BY `cards_id` DESC");
$checks = mysqli_query($db, "SELECT * FROM `checks` WHERE `users_id` = '$id' ORDER BY `cards_id` DESC");

if(!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="styles/uni.css">
    <title>БА-БАНК</title>
</head>
<body>
    <?php require ('components/header.php'); ?>
    <main>
        <section class="products">
            <div class="container">
                <div class="functions-title">
                    <h2 class="title">Карты</h2>
                    <a href="add-card.php" class="add-item button">Добавить</a>
                </div>
                <div class="products-cards">
                    <?php while ($card = mysqli_fetch_assoc($cards)) { ?>
                        <article class="cards-item">
                            <form action="functions/f_mod-card.php?card=<?= $card['cards_id']; ?>" method="POST" class="card__functions">
                                <button name="delete" class="button-delete"></button>
                            </form>
                            <img src="<?= $card['cards_image']; ?>" alt="payment" class="card__image">
                            <h3 class="card__name"><?= $card['cards_name']; ?></h3>
                            <div class="card__info">
                                <p class="info__number"><?php require ('components/card_number.php'); ?></p>
                                <p class="info__date"><?php require ('components/card_date.php'); ?></p>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
        <section class="checks">
            <div class="container">
                <div class="functions-title">
                    <h2 class="title">История</h2>
                    <a href="add-check.php" class="add-item button">Добавить</a>
                </div>
                <p class="checks__sum">Всего затрачено: <span><?= sum($id); ?></span> ₽</p>
                <div class="products-checks">
                    <?php while ($check = mysqli_fetch_assoc($checks)) { ?>
                        <article class="checks-item">
                            <div class="check__date">
                                <p><?= $check['checks_date']; ?></p>
                                <p><?= $check['checks_time']; ?></p>
                            </div>
                            <h3 class="check__name"><?= $check['checks_product']; ?></h3>
                            <p class="check__sum"><?= $check['checks_sum']; ?> <span style="font-weight: 700;">₽</span></p>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
</body>
</html>