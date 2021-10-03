<?php
session_start();

if($_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="/styles/uni.css">
    <title>БА-БАНК - Регистрация</title>
</head>
<body>
<?php require ('components/header.php'); ?>
    <main>
        <div class="forms">
            <div class="container">
                <h2 class="title">Регистрация</h2>
                <form action="functions/f_auth.php" method="POST" class="form-content">
                    <!-- 1 -->
                    <label class="form-label">Полное имя</label>
                    <input type="text" name="name" class="form-input" placeholder="Введите полное имя" required>
                    <!-- 2 -->
                    <label class="form-label">Почта</label>
                    <input type="text" name="email" class="form-input" placeholder="Введите почту" required>
                    <!-- 3 -->
                    <label class="form-label">Пароль</label>
                    <input type="text" name="password" class="form-input" placeholder="Введите пароль" required>
                    <!-- 4 -->  
                    <label class="form-label">Подтверждение пароля</label>
                    <input type="text" name="password_confirm" class="form-input" placeholder="Введите повторно пароль" required>
                    <!-- 5 -->   
                    <button type="submit" name="register" class="button">Регистрация</button>
                    <small class="form-error"><?php echo $_SESSION['error']; unset ($_SESSION['error']); ?></small>
                </form>
            </div>
        </div>
    </main>
</body>
</html>