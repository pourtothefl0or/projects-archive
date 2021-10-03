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
    <title>БА-БАНК - Вход</title>
</head>
<body>
<?php require ('components/header.php'); ?>
    <main>
        <div class="forms">
            <div class="container">
                <h2 class="title">Вход</h2>
                <form action="functions/f_auth.php" method="POST" class="form-content">
                    <!-- 1 -->
                    <label class="form-label">Почта</label>
                    <input type="text" name="email" class="form-input" placeholder="Введите почту" required>
                    <!-- 2 -->
                    <label class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-input" placeholder="Введите пароль" required>
                    <!-- 3 -->   
                    <button type="submit" name="login" class="button">Вход</button>
                    <small class="form-error"><?php echo $_SESSION['error']; unset ($_SESSION['error']); ?></small>
                </form>
            </div>
        </div>
    </main>
</body>
</html>