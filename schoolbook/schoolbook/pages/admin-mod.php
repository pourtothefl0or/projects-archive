<?php
session_start();
require ('../config/connect.php');

if (!$_SESSION['user']['flag'] == 1) {
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
    <link rel="stylesheet" href="../styles/admin.css">
    <title>SCHOOLBOOK - МОДЕРИРОВАНИЕ</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="admin pd">
            <div class="container">
                <div class="admin-links">
                    <a href="admin-add.php" class="admin-btn" style="border-radius: 8px 0 0 8px;">Добавление</a>
                    <a href="admin-edit.php" class="admin-btn">Редактирование</a>
                    <a href="admin-mod.php" class="admin-btn active" style="border-radius: 0 8px 8px 0;">Модерирование</a>
                </div>
                <div class="admin-edits">
                    <h2 class="title middle-title">Заявки</h2>
                    <div class="admin-content table">
                        <table class="admin-table">
                            <tr class="table-titles">
                                <th class="title-item">ID</th>
                                <th class="title-item">Почта</th>
                            </tr>
                            <?php $tables = mysqli_query($connect, "SELECT * FROM `help`");
                            while ($table = mysqli_fetch_assoc($tables)) { ?>
                            <tr class="table-description">
                                <td class="decscription-item"><?php echo $table['id']; ?></td>
                                <td class="decscription-item"><?php echo $table['email']; ?></td>
                                <td class="decscription-item"><a href="/functions/f_delete-help.php?id=<?php echo $table['id']; ?>">Удалить</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="admin-edits">
                    <h2 class="title middle-title">Редактировать пользователей</h2>
                    <?php require ('../config/error.php'); ?>
                    <div class="admin-content table">
                        <table class="admin-table">
                            <tr class="table-titles">
                                <th class="title-item">ID</th>
                                <th class="title-item">Имя</th>
                                <th class="title-item">Почта</th>
                                <th class="title-item">Пароль</th>
                                <th class="title-item">Доступ</th>
                            </tr>
                            <?php $tables = mysqli_query($connect, "SELECT * FROM `users`");
                            while ($table = mysqli_fetch_assoc($tables)) { ?>
                            <tr class="table-description">
                                <td class="decscription-item"><?php echo $table['id']; ?></td>
                                <td class="decscription-item"><?php echo $table['name']; ?></td>
                                <td class="decscription-item"><?php echo $table['email']; ?></td>
                                <td class="decscription-item"><?php echo $table['password']; ?></td>
                                <td class="decscription-item"><?php echo $table['flag']; ?></td>
                                <td class="decscription-item"><a href="edit-users.php?id=<?php echo $table['id']; ?>">Редактировать</a></td>
                                <td class="decscription-item"><a href="/functions/f_delete-users.php?id=<?php echo $table['id']; ?>">Удалить</a></td>
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