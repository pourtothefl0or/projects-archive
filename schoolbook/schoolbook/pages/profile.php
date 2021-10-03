<?php
session_start();
require ('../config/connect.php');

if (!$_SESSION['user']) {
    header ('Location: ../index.php');
}

$user = $_SESSION['user']['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/uni.css">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>SCHOOLBOOK - МОДЕРИРОВАНИЕ</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="profile pd">
            <div class="container">
                <div class="profile-links">
                    <a href="profile.php" class="profile-btn active" style="border-radius: 8px 0 0 8px;">Профиль</a>
                    <a href="edit-profile.php?id=<?php echo $_SESSION['user']['id']; ?>" class="profile-btn" style="border-radius: 0 8px 8px 0;">Редактирование</a>
                </div>
                <div class="profile-edits">
                    <h2 class="title middle-title">Редактировать профиля</h2>
                    <?php require ('../config/error.php'); ?>
                    <div class="profile-content table">
                        <table class="profile-table">
                            <tr class="table-titles">
                                <th class="title-item">Полное имя</th>
                                <th class="title-item">Почта</th>
                                <th class="title-item">Пароль</th>
                            </tr>
                            <?php $tables = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$user'");
                            while ($table = mysqli_fetch_assoc($tables)) { ?>
                            <tr class="table-description">
                                <td class="decscription-item"><?php echo $table['name']; ?></td>
                                <td class="decscription-item"><?php echo $table['email']; ?></td>
                                <td class="decscription-item"><?php echo $table['password']; ?></td>
                                <td class="decscription-item"><a href="/functions/f_delete-user.php?id=<?php echo $table['id']; ?>">Удалить</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php require ('../components/footer.php'); ?>
<script src="../scripts/menu.js"></script>
</body>
</html>