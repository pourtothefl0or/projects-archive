<?php
session_start();
require('vendor/connect.php');
require('vendor/functions.php');
$get_city = get_city();
$get_category = get_category();

if (isset($_GET['search'])) {
    $products_query = "SELECT * FROM `products` WHERE `products_name` LIKE '%{$_GET['search']}%'";
} else {
    $products_query = "SELECT * FROM `products` WHERE $get_city AND $get_category";
}
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
        <section class="products">
            <div class="container big-container padding-t-b flex-s">
                <?php require('filter.php'); ?>
                <!-- PRODUCTS -->
                <div class="products-content">
                    <?php $products = mysqli_query($connect, $products_query); foreach($products as $products_item) { ?>
                        <!-- PRODUCT CARD -->
                        <div class="product-card flex-col">
                            <p class="product-card__rate"><?= $products_item['categories_name']; ?></p>
                            <!-- CARD CONTENT -->
                            <div class="product-card-info flex-col">
                                <div class="product-card__image">
                                    <img src="<?= $products_item['products_image']; ?>" alt="" class="image-cover">
                                </div>
                                <div class="product-card-text flex-col-sb-c">
                                    <div>
                                        <h3 class="product-card-text__title"><?= $products_item['products_name']; ?></h3>
                                        <p class="product-card-text__desc"><?= mb_strimwidth($products_item['products_desc'], 0, 25, "..."); ?></p>
                                    </div>
                                    <p class="product-card-text__city"><?= $products_item['cities_name']; ?></p>
                                </div>
                            </div>
                            <!-- /CARD CONTENT -->
                            <a href="product.php?id=<?= $products_item['products_id']; ?>" class="product-card-button">Открыть</a>
                        </div>
                        <!-- /PRODUCT CARD -->
                    <?php } ?>
                </div>
                <!-- /PRODUCTS -->
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/widget.js"></script>
<script src="assets/js/exit.js"></script>
</body>
</html>