<!-- HEADER -->
<header class="header">
    <div class="container flex-sb-c">
        <a href="/" class="logo"></a>
        <div class="header-nav flex-c">
            <?php if (!$_SESSION['user']['id'] == 1) { ?>
            <button class="btn-icon icon-login btn-modal" data-path="form-login"></button>
            <?php } else { ?>
            <button name="exit" class="btn-icon icon-exit"></button>
            <button class="btn-icon icon-add btn-modal" data-path="form-add"></button>
            <?php } ?>
        </div>
        <form class="search flex-c">
            <button type="submit" class="btn-icon icon-search"></button>
            <input type="text" name="search" value="<?php echo $_GET['search']; ?>" class="ui-input__search">
            <div class="search-btns flex-c">
                <div class="search-menu">
                    <div class="btn-filter btn-menu">Категория</div>
                    <ul class="filter-list">
                        <?php $category = mysqli_query($connect, "SELECT * FROM `category`"); foreach($category as $category_item) { ?>
                            <li>
                                <label class="list-item flex-c">
                                    <label class="ui-wrap__label">
                                        <input type="radio" name="category" value="<?= $category_item['category_name']; ?>" class="ui-radio__input" <?php if ($_GET['category'] == $category_item['category_name']) { echo "checked"; }?>>
                                        <span class="ui-radio__item"></span>
                                    </label>
                                    <p><?= $category_item['category_name']; ?></p>
                                </label>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <label class="ui-wrap__label">
                    <input type="checkbox" name="group" class="ui-checkbox_input" id="c_group" <?php if (isset($_GET['group'])) { echo "checked"; }?>></input>
                    <p class="btn-filter btn-group" id="b_group">Цена</p>
                </label>
            </div>
        </form>
    </div>
</header>
<!-- /HEADER -->