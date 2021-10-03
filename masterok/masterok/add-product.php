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
    <title>Добавить объявление</title>
</head>
<body>
<?php require('header.php'); ?>
    <main>
        <section class="auth">
            <div class="container padding-t-b flex-c-c">
                <form class="auth-form flex-col-c">
                    <h2 class="main-title">Добавить объявление</h2>
                    <div class="flex-s" style="gap: 20px;">
                        <div class="flex-col-c">
                            <select name="city" class="ui-input">
                                <?php $widget_cities = mysqli_query($connect, "SELECT * FROM `cities`"); foreach($widget_cities as $cities_item) { ?>
                                    <option value="<?= $cities_item['cities_name']; ?>"><?= $cities_item['cities_name']; ?></option>
                                <?php } ?>
                            </select>
                            <select name="category" class="ui-input" style="margin-bottom: 10px;">
                                <?php $widget_categories = mysqli_query($connect, "SELECT * FROM `categories`"); foreach($widget_categories as $categories_item) { ?>
                                    <option value="<?= $categories_item['categories_name']; ?>"><?= $categories_item['categories_name']; ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" name="name" class="ui-input" placeholder="Введите название">
                            <input type="file" name="image" class="ui-input" accept=".jpg, .jpeg, .png">
                            <input type="text" name="number" class="ui-input telephone" placeholder="Введите контактный номер">
                            <input type="text" name="whatsapp" class="ui-input telephone" placeholder="Введите контактный номер WhatsApp">
                            <input type="text" name="telegram" class="ui-input telephone" placeholder="Введите контактный номер Telegram">
                            <input type="text" name="viber" class="ui-input telephone" placeholder="Введите контактный номер Viber">
                        </div>
                        <textarea name="desc" class="ui-input ui-input_textarea" placeholder="Введите описание"></textarea>
                    </div>
                    <button type="submit" name="button_add" class="ui-button">Добавить</button>
                    <p class="error" id="error_add"></p>
                </form>
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.maskedinput.js"></script>
<script src="assets/js/mask.js"></script>
<script src="assets/js/add-product.js"></script>
<script src="assets/js/exit.js"></script>
</body>
</html>