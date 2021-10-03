<!-- HEADER -->
<header class="header">
    <div class="container flex-sb-c">
        <a href="/" class="logo"></a>
        <form method="GET">
            <div class="header-search flex-c">
                <input type="text" name="search" value="<?= $_GET['search']; ?>" class="header-search__text">
                <button type="submit" class="header-search__button btn-icon icon-search"></button>
            </div>
        </form>
        <ul class="header-nav flex-c">
            <?php if ($_SESSION['user']) { ?>
                <li class="header-nav__item"><a href="add-product.php" class="btn-icon icon-add-product"></a></li>
                <li class="header-nav__item"><a href="profile.php" class="btn-icon icon-profile"></a></li>
                <li class="header-nav__item"><form><button name="exit" class="btn-icon icon-exit"></button></form></li>
            <?php } else { ?>
                <li class="header-nav__item"><a href="login.php" class="btn-icon icon-profile"></a></li>
            <?php } ?>
        </ul>
    </div>
</header>
<!-- /HEADER -->