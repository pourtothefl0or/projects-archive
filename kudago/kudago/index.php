<?php
session_start();
require 'functions/connect.php';
require 'functions/functions.php';

$filter_category = filter_category();
$filter_group = filter_group();

$products_query = "SELECT * FROM `products` WHERE $filter_category AND `products_name` LIKE '%{$_GET['search']}%' ORDER BY `products_price` $filter_group";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/css/style.css">
    <title>KUDAGO</title>
</head>
<body>
<?php require 'header.php'; require 'modal.php'; ?>
    <main>
        <!-- CARDS -->
        <section class="cards indent-t-b">
            <div class="container">
                <div class="cards-content">
                    <?php $products = mysqli_query($connect, $products_query); foreach($products as $products_item) { ?>
                        <!-- CARD ITEM -->
                        <div class="card-item">
                            <p class="card-item__price"><?= '~ '.$products_item['products_price'].' ₽'; ?></p>
                            <div class="card-item__image">
                                <img src="<?= $products_item['products_image']; ?>" alt="IMAGE" class="image-cover">
                            </div>
                            <div class="card-item__desc">
                                <h2 class="item-elem card-item__name" <?php if (mb_strlen($products_item['products_name']) > 20) { echo 'style="font-size: 12px;"'; } ?>><?= $products_item['products_name']; ?></h2>
                                <p class="item-elem card-item__adress flex-c" <?php if (mb_strlen($products_item['products_adress']) > 30) { echo 'style="font-size: 12px;"'; } ?>><?= $products_item['products_adress']; ?></p>
                                <a href="tel:<?= '+'.$phone = preg_replace('![^0-9]+!', '', $products_item['products_tel']); ?>" class="item-elem card-item__tel flex-c"><?= $products_item['products_tel']; ?></a>
                            </div>
                        </div>
                        <!-- /CARD ITEM -->
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- /CARDS -->
    </main>

<!-- SCRIPTS -->
<script src="vendor/js/jquery-3.6.0.min.js"></script>
<script src="vendor/js/menu.js"></script>
<script src="vendor/js/modal.js"></script>
<script src="vendor/js/auth.js"></script>
<script src="vendor/js/product.js"></script>
<!-- /SCRIPTS -->
</body>
</html>