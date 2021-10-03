<?php
session_start();
require ('../config/connect.php');

if (!$_SESSION['user']['flag'] == 1) {
    header ('Location: ../index.php');
}

$id = $_GET['id'];

$edits = mysqli_query($connect, "SELECT * FROM `books` WHERE `id` = '$id'");
$edit = mysqli_fetch_assoc($edits);
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
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="admin pd">
            <div class="container">
                <div class="admin-links">
                    <a href="admin-edit.php" class="admin-btn active" style="border-radius: 8px;">НАЗАД</a>
                </div>
                <div class="admin-edit">
                    <div class="admin-content pd">
                        <h2 class="title middle-title">Редактировать книгу "<?php echo $edit['name']; ?>"</h2>
                        <form action="../functions/f_edit-books.php?id=<?php echo $edit['id']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="admin-content">
                                <label for="id" class="info-label">ID</label>
                                <input type="number" name="id" class="info-input" value="<?php echo $edit['id']; ?>">
                                <label for="name" class="info-label">Название учебника</label>
                                <input type="text" name="name" class="info-input" value="<?php echo $edit['name']; ?>">
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
                                    while ($subject = mysqli_fetch_assoc($subjects)) { 
                                        if ($subject['subject'] !=  $edit['subject']) { // Второе сравнение не нужно ?>
                                        <option value="<?php echo $edit['subject']; ?>" hidden><?php echo $edit['subject']; ?></option>
                                        <?php } ?>
                                        <option value="<?php echo $subject['subject']; ?>"><?php echo $subject['subject']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="author" class="info-label">Автор</label>
                                <input type="text" name="author" class="info-input" value="<?php echo $edit['author']; ?>">
                                <label for="year" class="info-label">Год издательства</label>
                                <input type="number" name="year" class="info-input" min="1800" max="2100" value="<?php echo $edit['year']; ?>">
                                <label for="image" class="info-label">Изображение обложки</label>
                                <input type="file" name="image" class="info-input">
                                <label for="link" class="info-label">Ссылка</label>
                                <input type="text" name="link" class="info-input" value="<?php echo $edit['link']; ?>">
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