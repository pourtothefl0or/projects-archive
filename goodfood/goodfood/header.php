<!-- header -->
<header class="header">
    <div class="container flex-sb-c">
        <a href="/" class="logo">
            <img src="assets/img/logo.svg" alt="logo" class="logo__img">
        </a>
        <ul class="header-nav flex-c">
            <li class="header-nav__item">
                <button class="item-link" id="button_modal" data-path="calc">Калькулятор</button>
            </li>
            <?php if (!$_SESSION['user']) { ?>
                <li class="header-nav__item">
                    <button class="item-link" id="button_modal" data-path="login">Авторизация</button>
                </li>
            <?php } else { ?>
                <?php if ($_SESSION['user']['flag'] == 1) { ?>
                    <li class="header-nav__item">
                        <button class="item-link" id="button_modal" data-path="product-add">Добавить продукт</button>
                    </li>
                <?php } ?>
                <li class="header-nav__item">   
                    <a href="favorite.php" class="item-link">Избранное</a>
                </li>
                <li class="header-nav__item">
                    <button class="item-link" id="button_logout">Выход</button>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php require('modals.php'); ?>
</header>
<!-- //header -->