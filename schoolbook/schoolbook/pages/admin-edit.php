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
    <title>SCHOOLBOOK - РЕДАКТИРОВАНИЕ</title>
    <link rel="shortcut icon" type="image/svg" href="../images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="admin pd">
            <div class="container">
                <div class="admin-links">
                    <a href="admin-add.php" class="admin-btn" style="border-radius: 8px 0 0 8px;">Добавление</a>
                    <a href="admin-edit.php" class="admin-btn active">Редактирование</a>
                    <a href="admin-mod.php" class="admin-btn" style="border-radius: 0 8px 8px 0;">Модерирование</a>
                </div>
                <div class="admin-edits">
                    <h2 class="title middle-title">Редактировать предметы</h2>
                    <?php if($_SESSION['message1']) {
                                    echo '<p class="message center">' . $_SESSION['message1'] . ' </p>';
                                    } unset($_SESSION['message1']);
                                ?>
                    <div class="admin-content table">
                        <table class="admin-table">
                            <tr class="table-titles">
                                <th class="title-item">ID</th>
                                <th class="title-item">Предмет</th>
                            </tr>
                            <?php $tables = mysqli_query($connect, "SELECT * FROM `subjects`");
                            while ($table = mysqli_fetch_assoc($tables)) { ?>
                            <tr class="table-description">
                                <td class="decscription-item"><?php echo $table['id']; ?></td>
                                <td class="decscription-item"><?php echo $table['subject']; ?></td>
                                <td class="decscription-item"><a href="edit-subjects.php?id=<?php echo $table['id']; ?>">Редактировать</a></td>
                                <td class="decscription-item"><a href="/functions/f_delete-subjects.php?id=<?php echo $table['id']; ?>">Удалить</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="admin-edits">
                    <h2 class="title middle-title">Редактировать классы</h2>
                    <?php if($_SESSION['message2']) {
                        echo '<p class="message center">' . $_SESSION['message2'] . ' </p>';
                        } unset($_SESSION['message2']);
                    ?>
                    <div class="admin-content table">
                        <table class="admin-table">
                            <tr class="table-titles">
                                <th class="title-item">ID</th>
                                <th class="title-item">Класс</th>
                                <th class="title-item">Изображение карточки</th>
                            </tr>
                            <?php $tables = mysqli_query($connect, "SELECT * FROM `classes`");
                            while ($table = mysqli_fetch_assoc($tables)) { ?>
                            <tr class="table-description">
                                <td class="decscription-item"><?php echo $table['id']; ?></td>
                                <td class="decscription-item"><?php echo $table['class']; ?></td>
                                <td class="decscription-item"><?php echo $table['image']; ?></td>
                                <td class="decscription-item"><a href="edit-classes.php?id=<?php echo $table['id']; ?>">Редактировать</a></td>
                                <td class="decscription-item"><a href="/functions/f_delete-classes.php?id=<?php echo $table['id']; ?>&product=<?php echo $table['image']; ?>">Удалить</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="admin-edits">
                    <h2 class="title middle-title">Редактировать книги</h2>
                    <?php if($_SESSION['message3']) {
                        echo '<p class="message center">' . $_SESSION['message3'] . ' </p>';
                        } unset($_SESSION['message3']);
                    ?>
                    <div class="admin-content table">
                        <table class="admin-table">
                            <tr class="table-titles">
                                <th class="title-item">ID</th>
                                <th class="title-item">Класс</th>
                                <th class="title-item">Предмет</th>
                                <th class="title-item">Название</th>
                                <th class="title-item">Автор</th>
                                <th class="title-item">Год издания</th>
                                <th class="title-item">Изображение (DIR)</th>
                                <th class="title-item">Ссылка (ID)</th>
                            </tr>
                            <?php $tables = mysqli_query($connect, "SELECT * FROM `books`");
                            while ($table = mysqli_fetch_assoc($tables)) { ?>
                            <tr class="table-description">
                                <td class="decscription-item"><?php echo $table['id']; ?></td>
                                <td class="decscription-item"><?php echo $table['class']; ?></td>
                                <td class="decscription-item"><?php echo $table['subject']; ?></td>
                                <td class="decscription-item"><?php echo $table['name']; ?></td>
                                <td class="decscription-item"><?php echo $table['author']; ?></td>
                                <td class="decscription-item"><?php echo $table['year']; ?></td>
                                <td class="decscription-item"><?php echo $table['image']; ?></td>
                                <td class="decscription-item"><?php echo $table['link']; ?></td>
                                <td class="decscription-item"><a href="edit-books.php?id=<?php echo $table['id']; ?>">Редактировать</a></td>
                                <td class="decscription-item"><a href="/functions/f_delete-books.php?id=<?php echo $table['id']; ?>&product=<?php echo $table['image']; ?>">Удалить</a></td>
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