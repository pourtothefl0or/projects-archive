<?php
session_start();
require ('config/connect.php');

$classes = mysqli_query($connect,"SELECT * FROM `classes`");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/uni.css">
    <link rel="stylesheet" href="/styles/classes.css">
    <title>SCHOOLBOOK - КЛАСС</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('components/header.php'); ?>
    <main>
        <section class="classes pd">
            <div class="container">
                <h2 class="title middle-title" id="classes">Классы</h2>
                <div class="classses-content">
                    <?php while ($class = mysqli_fetch_assoc($classes)) { ?>
                    <a href="pages/classesbooks.php?id=<?php echo $class['class']; ?>">
                        <article class="classes-card">
                            <img src="<?php echo '/'.$class['image']; ?>" alt="Class 1">
                            <h3 class="classes-subtitle"><?php echo $class['class']; ?></h3>
                        </article>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
<?php require ('components/footer.php'); ?>
<script src="/scripts/menu.js"></script>
</body>
</html>