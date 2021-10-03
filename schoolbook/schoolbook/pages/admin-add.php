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
    <title>SCHOOLBOOK - ДОБАВЛЕНИЕ</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="admin pd">
            <div class="container">
                <div class="admin-links">
                    <a href="admin-add.php" class="admin-btn active" style="border-radius: 8px 0 0 8px;">Добавление</a>
                    <a href="admin-edit.php" class="admin-btn">Редактирование</a>
                    <a href="admin-mod.php" class="admin-btn" style="border-radius: 0 8px 8px 0;">Модерирование</a>
                </div>
                <div class="admin-adds">
                    <div class="admin-content pd" id="admin-form-one">
                        <h2 class="title middle-title">Добавить предмет</h2>
                        <form action="../functions/f_add-subjects.php" method="POST">
                            <div class="admin-content">
                                <label for="subject" class="info-label">Название предмета</label>
                                <input type="text" name="subject" class="info-input" placeholder="Введите название предмета">
                                <?php if($_SESSION['message1']) {
                                    echo '<p class="message center">' . $_SESSION['message1'] . ' </p>';
                                    } unset($_SESSION['message1']);
                                ?>
                                <button type="submit" class="button">Добавить предмет</button>
                            </div>
                        </form>
                    </div>
                    <div class="admin-content pd" id="admin-form-two">
                        <h2 class="title middle-title">Добавить класс</h2>
                        <form action="../functions/f_add-classes.php" method="POST" enctype="multipart/form-data">
                            <div class="admin-content">
                                <label for="class" class="info-label">Название класса</label>
                                <input type="text" name="class" class="info-input" placeholder="Введите название класса">
                                <label for="image1" class="info-label">Изображение карточки</label>
                                <input type="file" name="image1" class="info-input">
                                <?php if($_SESSION['message2']) {
                                    echo '<p class="message center">' . $_SESSION['message2'] . ' </p>';
                                    } unset($_SESSION['message2']);
                                ?>
                                <button type="submit" class="button">Добавить класс</button>
                            </div>
                        </form>
                    </div>
                    <div class="admin-content pd" id="admin-form-three">
                        <h2 class="title middle-title">Добавить учебник</h2>
                        <form action="../functions/f_add-books.php" method="POST" enctype="multipart/form-data">
                            <div class="admin-content">
                                <label for="name" class="info-label">Название учебника</label>
                                <input type="text" name="name" class="info-input" placeholder="Введите название учебника">
                                <label for="class" class="info-label">Класс</label>
                                <select name="class" class="info-input">
                                <?php $classes = mysqli_query($connect,"SELECT * FROM `classes`");
                                while ($class = mysqli_fetch_assoc($classes)) { ?>
                                    <option value="<?php echo $class['class']; ?>"><?php echo $class['class']; ?></option>
                                <?php } ?>
                                </select>
                                <label for="subject" class="info-label">Предмет</label>
                                <select name="subject" class="info-input">
                                <?php $subjects = mysqli_query($connect,"SELECT * FROM `subjects`");
                                while ($subject = mysqli_fetch_assoc($subjects)) { ?>
                                    <option value="<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></option>
                                <?php } ?>
                                </select>
                                <label for="author" class="info-label">Автор</label>
                                <input type="text" name="author" class="info-input" placeholder="Введите автора(ов)">
                                <label for="year" class="info-label">Год издательства</label>
                                <input type="number" name="year" class="info-input" min="1800" max="2100" placeholder="Введите год издательства">
                                <label for="image2" class="info-label">Изображение обложки</label>
                                <input type="file" name="image2" class="info-input">
                                <label for="link" class="info-label">Ссылка</label>
                                <input type="text" name="link" class="info-input" placeholder="Введите ID ссылки">
                                <?php if($_SESSION['message3']) {
                                    echo '<p class="message center">' . $_SESSION['message3'] . ' </p>';
                                    } unset($_SESSION['message3']);
                                ?>
                                <button type="submit" class="button">Добавить учебник</button>
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