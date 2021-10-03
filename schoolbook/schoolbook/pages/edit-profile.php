<?php
session_start();
require ('../config/connect.php');

if (!$_SESSION['user']) {
    header ('Location: ../index.php');
}

$id = $_GET['id'];

$edits = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
$edit = mysqli_fetch_assoc($edits);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/uni.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>SCHOOLBOOK - ПРОФИЛЬ</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="profile pd">
            <div class="container">
                <div class="profile-links">
                    <a href="profile.php" class="profile-btn" style="border-radius: 8px 0 0 8px;">Профиль</a>
                    <a href="edit-profile.php?id=<?php echo $_SESSION['user']['id']; ?>" class="profile-btn active" style="border-radius: 0 8px 8px 0;">Редактирование</a>
                </div>
                <div class="profile-edit">
                    <div class="profile-content pd">
                        <h2 class="title middle-title">Редактировать профиль</h2>
                        <form action="../functions/f_edit-profile.php?id=<?php echo $_SESSION['user']['id']; ?>" method="POST">
                            <div class="profile-content">
                                <label for="name" class="info-label">Полное имя</label>
                                <input type="text" name="name" class="info-input" value="<?php echo $edit['name']; ?>">
                                <label for="email" class="info-label">Почта</label>
                                <input type="email" name="email" class="info-input" value="<?php echo $edit['email']; ?>">
                                <label for="password" class="info-label">Пароль</label>
                                <input type="text" name="password" class="info-input" placeholder="Введите пароль">
                                <label for="password_repeat" class="info-label">Проверка пароля</label>
                                <input type="password" name="password_repeat" class="info-input" placeholder="Введите пароль ещё раз">
                                <?php require ('../config/error.php'); ?>
                                <button type="submit" class="button">Редактировать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php require ('../components/footer.php'); ?>
<script src="../scripts/menu.js"></script>
</body>
</html>