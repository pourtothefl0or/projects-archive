<?php
session_start();
require('vendor/functions.php');
str_search();

if ($_SESSION['user']) { header('Location: index.php'); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Вход</title>
</head>
<body>
<?php require('header.php'); ?>
    <main>
        <section class="general">
            <div class="container big-container padding-t-b flex-c-c">
                <form class="auth-form flex-col-c">
                    <a href="register.php" class="auth-form__link btn-icon icon-register"></a>
                    <h2 class="main-title">Вход</h2>
                    <input type="text" name="email" class="ui-input" placeholder="Введите почту">
                    <input type="password" name="password" class="ui-input" placeholder="Введите пароль">
                    <button type="submit" name="button_login" class="ui-button">Войти</button>
                    <p class="error" id="error_login"></p>
                </form>
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/login.js"></script>
<script src="assets/js/exit.js"></script>
</body>
</html>