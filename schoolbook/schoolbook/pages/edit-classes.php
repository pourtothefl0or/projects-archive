<?php
session_start();
require ('../config/connect.php');

if (!$_SESSION['user']['flag'] == 1) {
    header ('Location: ../index.php');
}

$id = $_GET['id'];

$edits = mysqli_query($connect, "SELECT * FROM `classes` WHERE `id` = '$id'");
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
                        <h2 class="title middle-title">Редактировать класс "<?php echo $edit['class']; ?>"</h2>
                        <form action="../functions/f_edit-classes.php?id=<?php echo $edit['id']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="admin-content">
                                <label for="id" class="info-label">ID</label>
                                <input type="number" name="id" class="info-input" value="<?php echo $edit['id']; ?>">
                                <label for="class" class="info-label">Класс</label>
                                <input type="text" name="class" class="info-input" value="<?php echo $edit['class']; ?>">
                                <label for="image" class="info-label">Изображение карточки</label>
                                <input type="file" name="image" class="info-input">
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