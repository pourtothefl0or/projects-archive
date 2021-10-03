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
    <title>Регистрация</title>
</head>
<body>
<?php require 'header.php'; ?>
    <main>
        <section class="auth">
            <div class="container big-container padding-t-b flex-c-c">
                <form class="auth-form flex-col-c">
                    <a href="login.php" class="auth-form__link btn-icon icon-login"></a>
                    <h2 class="main-title">Регистрация</h2>
                    <input type="text" name="name" class="ui-input" placeholder="Введите имя">
                    <input type="text" name="email" class="ui-input" placeholder="Введите почту">
                    <input type="password" name="password" class="ui-input" placeholder="Введите пароль">
                    <input type="password" name="password_confirm" class="ui-input" placeholder="Введите повторно пароль">
                    <input type="text" name="telephone" class="ui-input telephone" placeholder="Введите номер телефона">
                    <div class="auth-form__accept flex-c">
                        <label>
                            <input type="checkbox" class="ui-checkbox_input" onchange="document.getElementById('submit').disabled = !this.checked;" hidden>
                            <div class="ui-checkbox_item"></div>
                        </label>
                        <p>Даю согласие на обработку <a href="#">персональных данных</a></p>
                    </div>
                    <button type="submit" name="button_register" class="ui-button" id="submit" disabled>Зарегистрироваться</button>
                    <p class="error" id="error_register"></p>
                </form>
            </div>
        </section>
    </main>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.maskedinput.js"></script>
<script src="assets/js/mask.js"></script>
<script src="assets/js/register.js"></script>
<script src="assets/js/exit.js"></script>
</body>
</html>