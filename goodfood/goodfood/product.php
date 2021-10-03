<?php
require('vendor/connect.php');
require('vendor/functions.php');
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
        <section class="product indent-t-b">
            <div class="container">
                <?php $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `products_id` = '{$_GET['id']}'"); foreach($product as $product_item) { ?>
                    <h1 class="product__title"><?= $product_item['products_name']; ?></h1>
                    <div class="product__content flex-s">
                        <div class="product__img section-wrap">
                            <div class="product__buttons flex-c">
                                <form>
                                    <?php
                                        if ($_SESSION['user']) {
                                            $get_favorite = mysqli_query($connect, "SELECT * FROM `favorite` WHERE `users_id` = '{$_SESSION['user']['id']}' AND `products_id` = '{$product_item['products_id']}'");
                                            if (mysqli_num_rows($get_favorite) > 0) {
                                    ?>
                                        <!-- delete favorite -->
                                        <button class="button-icon" id="button_favorite" data-id="<?= $product_item['products_id']; ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path class="button-icon__img" d="M21.206 2.81722C20.6952 2.30623 20.0888 1.90087 19.4213 1.62431C18.7539 1.34775 18.0385 1.2054 17.316 1.2054C16.5935 1.2054 15.8781 1.34775 15.2106 1.62431C14.5432 1.90087 13.9368 2.30623 13.426 2.81722L12.366 3.87722L11.306 2.81722C10.2743 1.78553 8.87503 1.20593 7.41599 1.20593C5.95696 1.20593 4.55769 1.78553 3.52599 2.81722C2.4943 3.84892 1.9147 5.24819 1.9147 6.70722C1.9147 8.16626 2.4943 9.56553 3.52599 10.5972L4.58599 11.6572L12.366 19.4372L20.146 11.6572L21.206 10.5972C21.717 10.0865 22.1223 9.48004 22.3989 8.81258C22.6755 8.14512 22.8178 7.42971 22.8178 6.70722C22.8178 5.98474 22.6755 5.26933 22.3989 4.60187C22.1223 3.93441 21.717 3.32798 21.206 2.81722Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        <!-- //delete favorite -->
                                    <?php } else { ?>
                                        <!-- add favorite -->
                                        <button class="button-icon" id="button_favorite" data-id="<?= $product_item['products_id']; ?>">
                                            <svg width="20" height="20" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path class="button-icon__img" d="M20.3029 2.81722C19.7921 2.30623 19.1857 1.90087 18.5182 1.62431C17.8508 1.34775 17.1354 1.2054 16.4129 1.2054C15.6904 1.2054 14.975 1.34775 14.3075 1.62431C13.6401 1.90087 13.0336 2.30623 12.5229 2.81722L11.4629 3.87722L10.4029 2.81722C9.3712 1.78553 7.97192 1.20593 6.51289 1.20593C5.05385 1.20593 3.65458 1.78553 2.62289 2.81722C1.5912 3.84892 1.0116 5.24819 1.0116 6.70722C1.0116 8.16626 1.5912 9.56553 2.62289 10.5972L3.68289 11.6572L11.4629 19.4372L19.2429 11.6572L20.3029 10.5972C20.8139 10.0865 21.2192 9.48004 21.4958 8.81258C21.7724 8.14512 21.9147 7.42971 21.9147 6.70722C21.9147 5.98474 21.7724 5.26933 21.4958 4.60187C21.2192 3.93441 20.8139 3.32798 20.3029 2.81722V2.81722Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        <!-- //add favorite -->
                                    <?php } } ?> 
                                </form>
                                <?php if ($_SESSION['user']['flag'] == 1) { ?>
                                    <!-- edit -->
                                    <button class="button-icon" id="button_modal" data-path="product-edit">
                                        <svg width="20" height="20" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="button-icon__img" d="M20.8178 5.56057C20.8186 5.42897 20.7934 5.2985 20.7436 5.17667C20.6938 5.05483 20.6205 4.94401 20.5278 4.85057L16.2878 0.610573C16.1944 0.517892 16.0836 0.444567 15.9617 0.394802C15.8399 0.345038 15.7094 0.319812 15.5778 0.320573C15.4462 0.319812 15.3158 0.345038 15.1939 0.394802C15.0721 0.444567 14.9613 0.517892 14.8678 0.610573L12.0378 3.44057L1.10783 14.3706C1.01515 14.464 0.94182 14.5748 0.892056 14.6967C0.842291 14.8185 0.817066 14.949 0.817827 15.0806V19.3206C0.817827 19.5858 0.923184 19.8401 1.11072 20.0277C1.29826 20.2152 1.55261 20.3206 1.81783 20.3206H6.05783C6.19775 20.3282 6.33772 20.3063 6.46865 20.2563C6.59957 20.2064 6.71854 20.1295 6.81783 20.0306L17.6878 9.10057L20.5278 6.32057C20.6191 6.22365 20.6935 6.11211 20.7478 5.99057C20.7575 5.91086 20.7575 5.83028 20.7478 5.75057C20.7525 5.70402 20.7525 5.65712 20.7478 5.61057L20.8178 5.56057ZM5.64783 18.3206H2.81783V15.4906L12.7478 5.56057L15.5778 8.39057L5.64783 18.3206ZM16.9878 6.98057L14.1578 4.15057L15.5778 2.74057L18.3978 5.56057L16.9878 6.98057Z" fill="white"/>
                                        </svg>
                                    </button>
                                    <!-- //edit -->
                                    <!-- delete -->
                                    <button class="button-icon" id="button_delete" data-id="<?= $product_item['products_id']; ?>">
                                        <svg width="20" height="20" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="button-icon__img" d="M1.81781 5.3213H3.81781M3.81781 5.3213H19.8178M3.81781 5.3213V19.3213C3.81781 19.8517 4.02852 20.3604 4.4036 20.7355C4.77867 21.1106 5.28738 21.3213 5.81781 21.3213H15.8178C16.3482 21.3213 16.857 21.1106 17.232 20.7355C17.6071 20.3604 17.8178 19.8517 17.8178 19.3213V5.3213H3.81781ZM6.81781 5.3213V3.3213C6.81781 2.79087 7.02852 2.28216 7.4036 1.90709C7.77867 1.53202 8.28738 1.3213 8.81781 1.3213H12.8178C13.3482 1.3213 13.857 1.53202 14.232 1.90709C14.6071 2.28216 14.8178 2.79087 14.8178 3.3213V5.3213M12.8178 10.3213V16.3213M8.81781 10.3213V16.3213" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <!-- //delete -->
                                <?php } ?>
                            </div>
                            <img src="<?= $product_item['products_image']; ?>" alt="product" class="img-cover">
                        </div>
                        <div class="product__desc section-wrap">
                            <ul class="product-list">
                                <li class="product-list__item">
                                    <h2 class="product-list__title">Калорийность (на 100г.):</h2>
                                    <p class="product-list__desc"><?= $product_item['products_property-1']; ?> кк.</p>
                                </li>
                                <li class="product-list__item">
                                    <h2 class="product-list__title">Белки</h2>
                                    <p class="product-list__desc"><?= $product_item['products_property-2']; ?> г.</p>
                                </li>
                                <li class="product-list__item">
                                    <h2 class="product-list__title">Жиры</h2>
                                    <p class="product-list__desc"><?= $product_item['products_property-3']; ?> г.</p>
                                </li>
                                <li class="product-list__item">
                                    <h2 class="product-list__title">Углеводы</h2>
                                    <p class="product-list__desc"><?= $product_item['products_property-4']; ?> г.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>