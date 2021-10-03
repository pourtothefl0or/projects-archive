<?php
session_start();
require('vendor/connect.php');
require('vendor/functions.php');
str_search();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>МАСТЕРОК</title>
</head>
<body>
<?php require('header.php'); ?>
    <main>
        <section class="product">
            <div class="container big-container padding-t-b">
                <div class="product-content">
                    <?php $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `products_id` = '{$_GET['id']}'"); foreach($product as $product_item) { ?>
                        <?php if ($_SESSION['user']['id'] == 1) { ?>
                            <form><button name="button_product_delete" class="ui-button product-delete" id="<?= $product_item['products_id']; ?>">Удалить</button></form>
                        <?php } ?>
                        <div class="product__layout">
                            <div class="product__image">
                                <img src="<?= $product_item['products_image']; ?>" alt="" class="image-cover">
                            </div>
                            <div class="product-info flex-col-sb">
                                <div class="product-info__text">
                                    <h2 class="main-title"><?= $product_item['products_name']; ?></h2>
                                    <ul class="product-list flex-sb-s">
                                        <li class="product-list__item">
                                            <h3 class="product__title">Город</h3>
                                            <p><?= $product_item['cities_name']; ?></p>
                                        </li>
                                        <li class="product-list__item">
                                            <h3 class="product__title">Категория</h3>
                                            <p><?= $product_item['categories_name']; ?></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex-sb-c">
                                    <a href="tel:<?= $product_item['products_number']; ?>" class="ui-button flex-c">Связаться</a>
                                    <a href="https://wa.me/<?= $product_item['products_whatsapp']; ?>" class="btn-call call-whatsapp"></a>
                                    <a href="https://t.me/<?= $product_item['products_telegram']; ?>" class="btn-call call-telegram"></a>
                                    <a href="viber://chat?number=<?= $product_item['products_viber']; ?>" class="btn-call call-viber"></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <h3 class="product__title">Описание</h3>
                                <p><?= $product_item['products_desc']; ?></p>
                            </div>
                        </div>
                        <?php if ($_SESSION['user']) { ?>
                        <form class="product-comment">
                            <div class="product-comment__header flex-sb-c">
                                <p class="product__title">Оставить отзыв</p>
                                <p class="error" id="error_comment"></p>
                            </div>
                            <textarea name="comment" class="ui-textarea"></textarea>
                            <button name="button_comment" class="ui-button" id="<?= $_GET['id']; ?>">Отправить</button>
                        </form>
                        <?php } ?>
                        <div class="product-comments">
                            <?php $comments = mysqli_query($connect, "SELECT * FROM `comments` ORDER BY `comments_id` DESC"); foreach($comments as $comments_item) { ?>
                                <div class="comments-item">
                                    <div class="comments-item__header flex-sb-c">
                                        <p class="comments-item__name"><?= $comments_item['users_name']; ?></p>
                                        <?php if ($_SESSION['user']['flag'] == 1) { ?>
                                            <form><button name="button_comment_delete" class="ui-button" id="<?= $comments_item['comments_id']; ?>">Удалить</button></form>
                                        <?php } ?>
                                    </div>
                                    <p class="comments-item__desc"><?= $comments_item['comments_desc']; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/add-comment.js"></script>
<script src="assets/js/delete-product.js"></script>
<script src="assets/js/delete-comment.js"></script>
<script src="assets/js/exit.js"></script>
</body>
</html>