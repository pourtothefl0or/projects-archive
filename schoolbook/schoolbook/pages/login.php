<?php
session_start();
require ('../config/connect.php');

if ($_SESSION['user']) {
    header ('Location: ../index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/uni.css">
    <link rel="stylesheet" href="../styles/sign.css">
    <title>SCHOOLBOOK - ВХОД</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="sign pd">
            <div class="container">
            <h2 class="title middle-title">Вход</h2>
                <form action="/functions/f_login.php" method="POST">
                    <div class="sign-content">
                        <label for="email" class="info-label">Почта</label>
                        <input type="email" name="email" class="info-input" placeholder="Введите почту">
                        <label for="password" class="info-label">Пароль</label>
                        <input type="password" name="password" class="info-input" placeholder="Введите пароль">
                        <?php require ('../config/error.php'); ?>
                        <button type="submit" class="button">Войти</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
<?php require ('../components/footer.php'); ?>
<script src="../scripts/menu.js"></script>
</body>
</html>