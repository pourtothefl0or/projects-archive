<?php
require('vendor/connect.php');
require('vendor/functions.php');

$get_category = get_category();
$get_sorting = get_sorting();
$implode = implode_category();
$order = "ORDER BY `category_name` ASC";
$products_query = "SELECT * FROM `products` JOIN `favorite` ON `products`.`products_id` = `favorite`.`products_id` $get_category $get_sorting $order";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/favicon.svg">
    <title>GF</title>
</head>
<body>
    <?php require('header.php'); ?>
    <main>
        <section class="catalog indent-t-b">
            <div class="container flex-s">
                <!-- filters -->
                <aside class="filters">
                    <form>
                        <!-- widget -->
                        <div class="widget">
                            <h3 class="widget__title <?php checkedCategory_title(); ?>">Категории</h3>
                            <ul class="widget-list <?php checkedCategory_body(); ?>">
                                <?php $category = mysqli_query($connect, "SELECT * FROM `category`"); foreach($category as $category_item) { ?>
                                    <!-- list item -->
                                    <li class="widget-list__item">
                                        <label class="widget-list__value">
                                            <label class="ui-wrapper">
                                                <input type="checkbox" name="category[]" value="<?= $category_item['category_name']; ?>" class="ui-checkbox" <?php if (strpos($implode, $category_item['category_name']) !== false) { echo "checked"; } ?>>
                                                <span class="ui-checkbox__item"></span>
                                            </label>
                                            <p><?= $category_item['category_name']; ?></p>
                                        </label>
                                    </li>
                                    <!-- //list item -->
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- //widget -->
                        <!-- widget -->
                        <div class="widget">
                            <h3 class="widget__title <?php checkedCalories_title(); ?>">Калорийность</h3>
                            <ul class="widget-list <?php checkedCalories_body(); ?>">
                                <!-- list item -->
                                <li class="widget-list__item">
                                    <label class="widget-list__value">
                                        <label class="ui-wrapper">
                                            <input type="radio" name="sorting" value="max" class="ui-radio" <?php checkedCalories_max(); ?>>
                                            <span class="ui-radio__item"></span>
                                        </label>
                                        <p>Высокая - Низкая</p>
                                    </label>
                                </li>
                                <!-- //list item -->
                                <!-- list item -->
                                <li class="widget-list__item">
                                    <label class="widget-list__value">
                                        <label class="ui-wrapper">
                                            <input type="radio" name="sorting" value="min" class="ui-radio" <?php checkedCalories_min(); ?>>
                                            <span class="ui-radio__item"></span>
                                        </label>
                                        <p>Низкая - Высокая</p>
                                    </label>
                                </li>
                                <!-- //list item -->
                            </ul>
                        </div>
                        <!-- //widget -->
                        <div class="filters__button">
                            <button class="ui-button ui-button">Поиск</button>
                            <button class="ui-button" id="reset">
                                <svg class="ui-button__reset" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4099 9L16.7099 2.71C16.8982 2.5217 17.004 2.2663 17.004 2C17.004 1.7337 16.8982 1.47831 16.7099 1.29C16.5216 1.1017 16.2662 0.995911 15.9999 0.995911C15.7336 0.995911 15.4782 1.1017 15.2899 1.29L8.99994 7.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L7.58994 9L1.28994 15.29C1.19621 15.383 1.12182 15.4936 1.07105 15.6154C1.02028 15.7373 0.994141 15.868 0.994141 16C0.994141 16.132 1.02028 16.2627 1.07105 16.3846C1.12182 16.5064 1.19621 16.617 1.28994 16.71C1.3829 16.8037 1.4935 16.8781 1.61536 16.9289C1.73722 16.9797 1.86793 17.0058 1.99994 17.0058C2.13195 17.0058 2.26266 16.9797 2.38452 16.9289C2.50638 16.8781 2.61698 16.8037 2.70994 16.71L8.99994 10.41L15.2899 16.71C15.3829 16.8037 15.4935 16.8781 15.6154 16.9289C15.7372 16.9797 15.8679 17.0058 15.9999 17.0058C16.132 17.0058 16.2627 16.9797 16.3845 16.9289C16.5064 16.8781 16.617 16.8037 16.7099 16.71C16.8037 16.617 16.8781 16.5064 16.9288 16.3846C16.9796 16.2627 17.0057 16.132 17.0057 16C17.0057 15.868 16.9796 15.7373 16.9288 15.6154C16.8781 15.4936 16.8037 15.383 16.7099 15.29L10.4099 9Z" fill="#ffffff"/>
                                </svg>
                                <span>Сбросить фильтры</span>
                            </button>
                        </div>
                    </form>
                </aside>
                <!-- //filters -->
                <!-- catalog cards -->
                <div class="catalog__content flex-c-w">
                    <?php $products = mysqli_query($connect, $products_query); foreach($products as $products_item) { ?>
                        <!-- card -->
                        <a href="product.php?id=<?= $products_item['products_id']; ?>" class="card-link">
                            <article class="card">
                                <p class="card__badge"><?= $products_item['category_name']; ?></p>
                                <div class="card__img">
                                    <img src="<?= $products_item['products_image']; ?>" alt="card image" class="img-cover">
                                </div>
                                <ul class="card-list">
                                    <li class="card-list__item">
                                        <h3 class="card__title"><?= $products_item['products_name']; ?></h3>
                                    </li>
                                    <li class="card-list__item">
                                        <p class="card__calories">Калорийность (на 100г.): <?= $products_item['products_property-1']; ?>кк.</p>
                                    </li>
                                </ul>
                            </article>
                        </a>
                        <!-- //card -->
                    <?php } ?>
                </div>
                <!-- //catalog cards -->
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>