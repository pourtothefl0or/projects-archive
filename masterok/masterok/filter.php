<!-- WIDGETS -->
<form class="widget-content flex-col-c" method="GET">
    <!-- WIDGET ITEM -->
    <div class="widget-item flex-col-c">
        <p class="widget-item-header flex-sb-c">Город</p>
        <ul class="widget-list <?php if ($_GET['city']) { echo "active"; } ?>">
            <?php $widget_cities = mysqli_query($connect, "SELECT * FROM `cities`"); foreach($widget_cities as $cities_item) { ?>
                <!-- LIST ITEM -->
                <li class="list-item">
                    <label class="item-content flex-c">
                        <label>
                            <input type="radio" name="city" value="<?= $cities_item['cities_name']; ?>" class="ui-radio__input" <?php if ($_GET['city'] == $cities_item['cities_name']) { echo "checked"; }?>>
                            <div class="ui-radio__item"></div>
                        </label>
                        <p class="item-text"><?= $cities_item['cities_name']; ?></p>
                    </label>
                </li>
                <!-- /LIST ITEM -->
            <?php } ?>
        </ul>
    </div>
    <!-- /WIDGET ITEM -->

    <!-- WIDGET ITEM -->
    <div class="widget-item flex-col-c">
    <p class="widget-item-header flex-sb-c">Категория</p>
        <ul class="widget-list active">
            <?php $widget_categories = mysqli_query($connect, "SELECT * FROM `categories`"); foreach($widget_categories as $categories_item) { ?>
                <!-- LIST ITEM -->
                <li class="list-item">
                    <label class="item-content flex-c">
                        <label>
                            <input type="radio" name="category" value="<?= $categories_item['categories_name']; ?>" class="ui-radio__input" <?php if ($_GET['category'] == $categories_item['categories_name']) { echo "checked"; }?>>
                            <div class="ui-radio__item"></div>
                        </label>
                        <p class="item-text"><?= $categories_item['categories_name']; ?></p>
                    </label>
                </li>
                <!-- /LIST ITEM -->
            <?php } ?>
        </ul>
    </div>
    <!-- /WIDGET ITEM -->
    <div class="widget-buttons flex-c">
        <a href="index.php" class="btn-icon icon-clear"></a>
        <button type="submit" class="ui-button">Найти</button>
    </div>
</form>
<!-- /WIDGETS -->