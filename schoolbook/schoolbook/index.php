<?php
session_start();
require ('config/connect.php');

mysqli_query($connect,"ALTER TABLE `classes` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `subjects` AUTO_INCREMENT = 1");
mysqli_query($connect,"ALTER TABLE `books` AUTO_INCREMENT = 1");

$classes = mysqli_query($connect,"SELECT * FROM `classes`");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/uni.css">
    <link rel="stylesheet" href="/styles/index.css">
    <title>SCHOOLBOOK</title>
    <link rel="shortcut icon" type="image/svg" href="/images/favicon.svg">
</head>
<body>
<?php require ('components/index-header.php'); ?>
    <main>
        <section class="hero">
            <div class="container center">
                <div class="hero-content">
                    <h1 class="big-title">
                        Ученье - свет!
                    </h1>
                    <p class="hero-decription">
                        Учёба — совокупность организованных мероприятий, направленных на получение знаний, умений, приобретение опыта.
                    </p>
                    <a href="#add" class="button">Связь с нами</a>
                </div>
            </div>
        </section>
        <section class="advantages pd">
            <div class="container">
                <div class="advantages-content">
                    <article class="advantages-card">
                        <span class="advantages-line"></span>
                        <div class="advantages-description">
                            <h2 class="advantages-title">11</h2>
                            <p class="advantages-text">Классов</p>
                        </div>
                    </article>
                    <article class="advantages-card">
                        <span class="advantages-line"></span>
                        <div class="advantages-description">
                            <h2 class="advantages-title">50+</h2>
                            <p class="advantages-text">Учебников</p>
                        </div>
                    </article>
                    <article class="advantages-card">
                        <span class="advantages-line"></span>
                        <div class="advantages-description">
                            <h2 class="advantages-title">100+</h2>
                            <p class="advantages-text">Авторов</p>
                        </div>
                    </article>
                    <article class="advantages-card">
                        <span class="advantages-line"></span>
                        <div class="advantages-description">
                            <h2 class="advantages-title">1000+</h2>
                            <p class="advantages-text">Учеников</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
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
        <section class="books pd">
            <div class="container center">
                <h2 class="title middle-title" id="books">Популярные учебники</h2>
                <div class="books-content">
                <?php $books = mysqli_query($connect,"SELECT * FROM `books` LIMIT 3");
                    while ($book = mysqli_fetch_assoc($books)) { ?>
                    <a href="pages/view.php?id=<?php echo $book['id']; ?>">
                        <article class="books-card">
                            <img src="<?php echo '/'.$book['image']; ?>" alt="Book" title="<?php echo $book['subject']; ?>">
                        </article>
                    </a>
                <?php } ?>
                </div>
                <a href="pages/books.php" class="button">Другие учебники</a>
            </div>
        </section>
        <section class="mail pd">
            <div class="container center">
                <div class="mail-content">
                    <h2 class="title middle-title" id="add">Хотите помочь проекту? Свяжитесь с нами!</h2>
                    <form action="functions/f_add-help.php" method="POST">
                        <div class="mail__form-content">
                            <input type="email" name="email" class="mail-input" placeholder="Введите вашу почту">
                            <button class="mail-button">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
<?php require ('components/footer.php'); ?>
<script src="scripts/menu.js"></script>
<script src="../scripts/menu.js"></script>
</body>
</html>