<!-- product add -->
<section class="modal modal-action flex-col" data-target="product-add">
    <button class="modal-action__close" id="button_modal">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path class="modal-action__close-img"  d="M10.4099 9L16.7099 2.71C16.8982 2.5217 17.004 2.2663 17.004 2C17.004 1.7337 16.8982 1.47831 16.7099 1.29C16.5216 1.1017 16.2662 0.995911 15.9999 0.995911C15.7336 0.995911 15.4782 1.1017 15.2899 1.29L8.99994 7.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L7.58994 9L1.28994 15.29C1.19621 15.383 1.12182 15.4936 1.07105 15.6154C1.02028 15.7373 0.994141 15.868 0.994141 16C0.994141 16.132 1.02028 16.2627 1.07105 16.3846C1.12182 16.5064 1.19621 16.617 1.28994 16.71C1.3829 16.8037 1.4935 16.8781 1.61536 16.9289C1.73722 16.9797 1.86793 17.0058 1.99994 17.0058C2.13195 17.0058 2.26266 16.9797 2.38452 16.9289C2.50638 16.8781 2.61698 16.8037 2.70994 16.71L8.99994 10.41L15.2899 16.71C15.3829 16.8037 15.4935 16.8781 15.6154 16.9289C15.7372 16.9797 15.8679 17.0058 15.9999 17.0058C16.132 17.0058 16.2627 16.9797 16.3845 16.9289C16.5064 16.8781 16.617 16.8037 16.7099 16.71C16.8037 16.617 16.8781 16.5064 16.9288 16.3846C16.9796 16.2627 17.0057 16.132 17.0057 16C17.0057 15.868 16.9796 15.7373 16.9288 15.6154C16.8781 15.4936 16.8037 15.383 16.7099 15.29L10.4099 9Z"/>
        </svg>                     
    </button>
    <h2 class="modal-action__title">Добавить блюдо</h2>
    <form class="modal-action__functions flex-col">
        <!-- ui-input -->
        <label class="ui-input_inner">
            <select class="ui-input__item" id="category_add" required>
                <option value="" hidden></option>
                <?php $category = mysqli_query($connect, "SELECT * FROM `category`"); foreach($category as $category_item) { ?>
                    <option value="<?= $category_item['category_name']; ?>"><?= $category_item['category_name']; ?></option>
                <?php } ?>
            </select>
            <span class="ui-input__name">Категория</span>
        </label>
        <!-- //ui-input -->

        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="text" id="name_add" class="ui-input__item" required>
            <span class="ui-input__name">Название</span>
        </label>
        <!-- //ui-input -->

        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="number" id="property1_add" class="ui-input__item" min="0" required>
            <span class="ui-input__name">Калорийность</span>
        </label>
        <!-- //ui-input -->

        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="number" id="property2_add" class="ui-input__item" min="0" required>
            <span class="ui-input__name">Белки</span>
        </label>
        <!-- //ui-input -->

        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="number" id="property3_add" class="ui-input__item" min="0" required>
            <span class="ui-input__name">Жиры</span>
        </label>
        <!-- //ui-input -->

        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="number" id="property4_add" class="ui-input__item" min="0" required>
            <span class="ui-input__name">Углеводы</span>
        </label>
        <!-- //ui-input -->

        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="file" id="image_add" class="ui-input__item ui-input__name--active" style="padding: 8px;" accept=".jpg, .jpeg, .png" required>
            <span class="ui-input__name ui-input__name--active">Изображение</span>
        </label>
        <!-- //ui-input -->
        <button class="ui-button" id="button_add">Добавить</button>
    </form>
    <p class="form-error" id="error_add"></p>
</section>
<!-- //product add -->
<!-- product edit -->
<section class="modal modal-action flex-col" data-target="product-edit">
    <button class="modal-action__close" id="button_modal">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path class="modal-action__close-img"  d="M10.4099 9L16.7099 2.71C16.8982 2.5217 17.004 2.2663 17.004 2C17.004 1.7337 16.8982 1.47831 16.7099 1.29C16.5216 1.1017 16.2662 0.995911 15.9999 0.995911C15.7336 0.995911 15.4782 1.1017 15.2899 1.29L8.99994 7.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L7.58994 9L1.28994 15.29C1.19621 15.383 1.12182 15.4936 1.07105 15.6154C1.02028 15.7373 0.994141 15.868 0.994141 16C0.994141 16.132 1.02028 16.2627 1.07105 16.3846C1.12182 16.5064 1.19621 16.617 1.28994 16.71C1.3829 16.8037 1.4935 16.8781 1.61536 16.9289C1.73722 16.9797 1.86793 17.0058 1.99994 17.0058C2.13195 17.0058 2.26266 16.9797 2.38452 16.9289C2.50638 16.8781 2.61698 16.8037 2.70994 16.71L8.99994 10.41L15.2899 16.71C15.3829 16.8037 15.4935 16.8781 15.6154 16.9289C15.7372 16.9797 15.8679 17.0058 15.9999 17.0058C16.132 17.0058 16.2627 16.9797 16.3845 16.9289C16.5064 16.8781 16.617 16.8037 16.7099 16.71C16.8037 16.617 16.8781 16.5064 16.9288 16.3846C16.9796 16.2627 17.0057 16.132 17.0057 16C17.0057 15.868 16.9796 15.7373 16.9288 15.6154C16.8781 15.4936 16.8037 15.383 16.7099 15.29L10.4099 9Z"/>
        </svg>                     
    </button>
    <h2 class="modal-action__title">Изменить блюдо</h2>
    <?php $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `products_id` = '{$_GET['id']}'"); foreach($product as $product_item) { ?>
        <form class="modal-action__functions flex-col">
            <!-- ui-input -->
            <label class="ui-input_inner">
                <select class="ui-input__item ui-input__name--active" id="category_edit" required>
                    <?php $category = mysqli_query($connect, "SELECT * FROM `category`"); foreach($category as $category_item) { ?>
                        <option value="<?= $category_item['category_name']; ?>" <?php if ($category_item['category_name'] == $product_item['category_name']) { echo "selected"; }?> required><?= $category_item['category_name']; ?></option>
                    <?php } ?>
                </select>
                <span class="ui-input__name ui-input__name--active">Категория</span>
            </label>
            <!-- //ui-input -->

            <!-- ui-input -->
            <label class="ui-input_inner">
                <input type="text" value="<?= $product_item['products_name']; ?>" id="name_edit" class="ui-input__item ui-input__name--active" required>
                <span class="ui-input__name ui-input__name--active">Название</span>
            </label>
            <!-- //ui-input -->

            <!-- ui-input -->
            <label class="ui-input_inner">
                <input type="number" value="<?= $product_item['products_property-1']; ?>" id="property1_edit" class="ui-input__item ui-input__name--active" min="0" required>
                <span class="ui-input__name ui-input__name--active">Калорийность</span>
            </label>
            <!-- //ui-input -->

            <!-- ui-input -->
            <label class="ui-input_inner">
                <input type="number" value="<?= $product_item['products_property-2']; ?>" id="property2_edit" class="ui-input__item ui-input__name--active" min="0" required>
                <span class="ui-input__name ui-input__name--active">Белки</span>
            </label>
            <!-- //ui-input -->

            <!-- ui-input -->
            <label class="ui-input_inner">
                <input type="number" value="<?= $product_item['products_property-3']; ?>" id="property3_edit" class="ui-input__item ui-input__name--active" min="0" required>
                <span class="ui-input__name ui-input__name--active">Жиры</span>
            </label>
            <!-- //ui-input -->

            <!-- ui-input -->
            <label class="ui-input_inner">
                <input type="number" value="<?= $product_item['products_property-4']; ?>" id="property4_edit" class="ui-input__item ui-input__name--active" min="0" required>
                <span class="ui-input__name ui-input__name--active">Углеводы</span>
            </label>
            <!-- //ui-input -->

            <!-- ui-input -->
            <label class="ui-input_inner">
                <input type="file" id="image_edit" class="ui-input__item ui-input__name--active" style="padding: 8px;" accept=".jpg, .jpeg, .png">
                <span class="ui-input__name ui-input__name--active">Изображение</span>
            </label>
            <!-- //ui-input -->
            <button class="ui-button" id="button_edit" data-id="<?= $product_item['products_id']; ?>">Изменить</button>
        </form>
        <p class="form-error" id="error_edit"></p>
    <?php } ?>
</section>
<!-- //product edit -->