<?php if (!$_SESSION['user']['id'] == 1) { ?>
<!-- LOGIN -->
<section class="action">
    <div class="modal-overlay flex-c-c">
        <div class="container">
            <form class="modal flex-col-c" data-target="form-login">
                <h2 class="main-title">Вход</h2>
                <input type="text" name="email" class="ui-input__input" placeholder="Введите логин">
                <input type="password" name="password" class="ui-input__input" placeholder="Введите пароль">
                <button name="login" class="btn">Войти</button>
                <p class="msg" id="msg_login"></p>
            </form>
        </div>
    </div>
</section>
<!-- /LOGIN -->

<?php } else { ?>

<!-- ADD -->
<section class="action">
    <div class="modal-overlay flex-c-c">
        <div class="container">
            <form class="modal flex-col-c" data-target="form-add">
                <h2 class="main-title">Добавить место</h2>
                <select name="add_category" class="ui-input__input" style="margin-bottom: 10px;">
                    <?php $select = mysqli_query($connect, "SELECT * FROM `category`"); foreach($select as $select_item) { ?>
                        <option value="<?= $select_item['category_name']; ?>"><?= $select_item['category_name']; ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="add_name" class="ui-input__input" placeholder="Введите название">
                <input type="text" name="add_adress" class="ui-input__input" placeholder="Введите адрес">
                <input type="text" name="add_tel" class="ui-input__input" placeholder="Введите номер">
                <input type="num" name="add_price" class="ui-input__input" min="0" placeholder="Введите средний чек">
                <input type="file" name="add_image" class="ui-input__input">
                <button name="add" class="btn">Добавить</button>
                <p class="msg" id="msg_add"></p>
            </form>
        </div>
    </div>
</section>
<!-- /ADD -->

<!-- EDIT -->
<!-- <section class="action">
    <div class="modal-overlay flex-c-c">
        <div class="container">
            <form class="modal flex-col-c" data-target="form-edit">
                <h2 class="main-title">Вход</h2>
                <input type="text" name="email" class="ui-input__input" placeholder="Введите логин">
                <input type="password" name="password" class="ui-input__input" placeholder="Введите пароль">
                <button name="login" class="btn">Войти</button>
                <p class="msg" id="msg_edit"></p>
            </form>
        </div>
    </div>
</section> -->
<!-- /EDIT -->
<?php } ?>