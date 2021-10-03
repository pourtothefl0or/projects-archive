<?php
session_start();
require ('../config/connect.php');

$id = $_GET['id'];

$books = mysqli_query($connect,"SELECT * FROM `books` WHERE `class` = '$id'");
$names = mysqli_query($connect,"SELECT * FROM `books` WHERE `class` = '$id'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/uni.css">
    <link rel="stylesheet" href="../styles/classesbooks.css">
    <title>SCHOOLBOOK - УЧЕБНИКИ КЛАССА</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('../components/header.php'); ?>
    <main>
        <section class="books pd">
            <div class="container center">
            <?php $name = mysqli_fetch_assoc($names); { ?>
            <h2 class="title middle-title">Учебники класса "<?php echo $name['class']; ?>"</h2>
            <?php } ?>
                <div class="books-content">
                <?php while ($book = mysqli_fetch_assoc($books)) { ?>
                    <a href="view.php?id=<?php echo $book['id']; ?>">
                        <article class="books-card">
                            <img src="<?php echo '/'.$book['image']; ?>" alt="Book" title="<?php echo $book['subject']; ?>">
                        </article>
                    </a>
                <?php } ?>
                </div>
            </div>
        </section>
    </main>
<?php require ('../components/footer.php'); ?>
<script src="../scripts/menu.js"></script>
</body>
</html>