<header class="header">
    <div class="container">
        <nav class="header-nav">
            <a href="/" class="header-logo">
                <img src="/images/header/logo.svg" alt="logo">
                <p class="logo-title">schoolbook</p>
            </a>
            <ul class="header-list middle">
                <li class="list-item"><a href="/classes.php" class="item-link">Классы</a></li>
                <li class="list-item sublist-parent">
                    <a href="#" class="item-link">Предметы</a>
                    <ul class="list-sublist">
                    <?php $subjects = mysqli_query($connect,"SELECT * FROM `subjects`");
                    while ($subject = mysqli_fetch_assoc($subjects)) { ?>
                        <li class="sublist-item"><a href="/pages/subjects.php?id=<?php echo $subject['subject']; ?>" class="item-link"><?php echo $subject['subject']; ?></a></li>
                    <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul class="header-list buttons">
                <?php if (!$_SESSION['user']) { ?>
                <li class="list-item"><a href="/pages/login.php" class="item-link button non">Вход</a></li>
                <li class="list-item"><a href="/pages/register.php" class="item-link button">Регистрация</a></li>
                <?php } else { ?>
                    <?php if ($_SESSION['user']['flag'] == 1) { ?>
                    <li class="list-item"><a href="/pages/admin-add.php" class="item-link button non">Администратор</a></li>    
                    <?php } else { ?>
                    <li class="list-item"><a href="/pages/profile.php" class="item-link button non">Профиль</a></li>   
                    <?php } ?>
                    <li class="list-item"><a href="/functions/f_logout.php" class="item-link button">Выход</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>