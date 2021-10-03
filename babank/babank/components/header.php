<header class="header">
    <div class="container">
        <a href="/" class="logo">БА-БАНК</a>
        <ul class="header-list">
            <?php if(!$_SESSION['user']) { ?>
                <li class="list-item"><a href="login.php" class="item-link">Вход</a></li>
                <li class="list-item"><a href="register.php" class="item-link">Регистрация</a></li>
            <?php } else { ?>
                <li class="list-item"><p class="item-link active"><?php echo $_SESSION['user']['name']; ?></p></li>
                <li class="list-item">
                    <form action="../functions/f_auth.php" method="POST">
                        <button name="exit" class="item-link" style="border: 0; background: 0;">Выход</button>
                    </form>
                </li>
            <?php } ?>
        </ul>
    </div>
</header>