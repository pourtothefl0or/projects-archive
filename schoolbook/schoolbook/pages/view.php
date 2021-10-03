<?php
session_start();
require ('../config/connect.php');

$id = $_GET['id'];

$download_start = 'https://drive.google.com/u/0/uc?id=';
$download_end = '&export=download';

$view_start = 'https://drive.google.com/file/d/';
$view_end = '/preview';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/uni.css">
    <link rel="stylesheet" href="../styles/view.css">
    <title>SCHOOLBOOK - ПРОСМОТР</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="books pd">
            <div class="container center">
                <?php $books = mysqli_query($connect,"SELECT * FROM `books` WHERE `id` = '$id'"); //+WHERE
                while ($book = mysqli_fetch_assoc($books)) { ?>
                    <h2 class="title middle-title"><?php echo $book['name']; ?></h2>
                    <div class="books-description pd">
                        <ul class="description-column">
                            <li class="column-element"><p class="element-text"><span>Класс: </span><?php echo $book['class']; ?></p></li>
                            <li class="column-element"><p class="element-text"><span>Автор: </span><?php echo $book['author']; ?></p></li>
                            <li class="column-element sub"><p class="element-text"><span>Год: </span><?php echo $book['year']?></p></li>
                            <li class="column-element"><a href="<?php echo $download_start.$book['link'].$download_end; ?>" class="button">Скачать учебник</a></li>
                        </ul>
                    </div>
                    <iframe src="<?php echo $view_start.$book['link'].$view_end; ?>"></iframe>
                <?php } ?>
            </div>
        </section>
    </main>
<?php require ('../components/footer.php'); ?>
<script src="../scripts/menu.js"></script>
</body>
</html>