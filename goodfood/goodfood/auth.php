<!-- login -->
<section class="modal modal-action flex-col" data-target="login">
    <button class="modal-action__close" id="button_modal">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path class="modal-action__close-img"  d="M10.4099 9L16.7099 2.71C16.8982 2.5217 17.004 2.2663 17.004 2C17.004 1.7337 16.8982 1.47831 16.7099 1.29C16.5216 1.1017 16.2662 0.995911 15.9999 0.995911C15.7336 0.995911 15.4782 1.1017 15.2899 1.29L8.99994 7.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L7.58994 9L1.28994 15.29C1.19621 15.383 1.12182 15.4936 1.07105 15.6154C1.02028 15.7373 0.994141 15.868 0.994141 16C0.994141 16.132 1.02028 16.2627 1.07105 16.3846C1.12182 16.5064 1.19621 16.617 1.28994 16.71C1.3829 16.8037 1.4935 16.8781 1.61536 16.9289C1.73722 16.9797 1.86793 17.0058 1.99994 17.0058C2.13195 17.0058 2.26266 16.9797 2.38452 16.9289C2.50638 16.8781 2.61698 16.8037 2.70994 16.71L8.99994 10.41L15.2899 16.71C15.3829 16.8037 15.4935 16.8781 15.6154 16.9289C15.7372 16.9797 15.8679 17.0058 15.9999 17.0058C16.132 17.0058 16.2627 16.9797 16.3845 16.9289C16.5064 16.8781 16.617 16.8037 16.7099 16.71C16.8037 16.617 16.8781 16.5064 16.9288 16.3846C16.9796 16.2627 17.0057 16.132 17.0057 16C17.0057 15.868 16.9796 15.7373 16.9288 15.6154C16.8781 15.4936 16.8037 15.383 16.7099 15.29L10.4099 9Z"/>
        </svg>                     
    </button>
    <h2 class="modal-action__title">Вход</h2>
    <form class="modal-action__functions flex-col">
        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="email" id="email_login" class="ui-input__item" required>
            <span class="ui-input__name">Почта</span>
        </label>
        <!-- //ui-input -->
        <!-- ui-input -->
        <label class="ui-input_inner">
            <input type="password" id="password_login" class="ui-input__item" required>
            <span class="ui-input__name">Пароль</span>
        </label>
        <!-- //ui-input -->
        <button class="ui-button" id="button_login">Вход</button>
    </form>
    <p class="form-error" id="error_login"></p>
    <button class="modal-action__link item-link" id="button_modal" data-path="register">Регистрация</button>
</section>
<!-- //login -->
<!-- register -->
<section class="modal modal-action flex-col" data-target="register">
    <button class="modal-action__close" id="button_modal">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path class="modal-action__close-img"  d="M10.4099 9L16.7099 2.71C16.8982 2.5217 17.004 2.2663 17.004 2C17.004 1.7337 16.8982 1.47831 16.7099 1.29C16.5216 1.1017 16.2662 0.995911 15.9999 0.995911C15.7336 0.995911 15.4782 1.1017 15.2899 1.29L8.99994 7.59L2.70994 1.29C2.52164 1.1017 2.26624 0.995911 1.99994 0.995911C1.73364 0.995911 1.47824 1.1017 1.28994 1.29C1.10164 1.47831 0.995847 1.7337 0.995847 2C0.995847 2.2663 1.10164 2.5217 1.28994 2.71L7.58994 9L1.28994 15.29C1.19621 15.383 1.12182 15.4936 1.07105 15.6154C1.02028 15.7373 0.994141 15.868 0.994141 16C0.994141 16.132 1.02028 16.2627 1.07105 16.3846C1.12182 16.5064 1.19621 16.617 1.28994 16.71C1.3829 16.8037 1.4935 16.8781 1.61536 16.9289C1.73722 16.9797 1.86793 17.0058 1.99994 17.0058C2.13195 17.0058 2.26266 16.9797 2.38452 16.9289C2.50638 16.8781 2.61698 16.8037 2.70994 16.71L8.99994 10.41L15.2899 16.71C15.3829 16.8037 15.4935 16.8781 15.6154 16.9289C15.7372 16.9797 15.8679 17.0058 15.9999 17.0058C16.132 17.0058 16.2627 16.9797 16.3845 16.9289C16.5064 16.8781 16.617 16.8037 16.7099 16.71C16.8037 16.617 16.8781 16.5064 16.9288 16.3846C16.9796 16.2627 17.0057 16.132 17.0057 16C17.0057 15.868 16.9796 15.7373 16.9288 15.6154C16.8781 15.4936 16.8037 15.383 16.7099 15.29L10.4099 9Z"/>
        </svg>                     
    </button>
    <h2 class="modal-action__title">Регистрация</h2>
    <form class="modal-action__functions flex-col">
        <label class="ui-input_inner">
            <input type="text" class="ui-input__item" id="name_register" required>
            <span class="ui-input__name">Полное имя</span>
        </label>
        <label class="ui-input_inner">
            <input type="email" class="ui-input__item" id="email_register" required>
            <span class="ui-input__name">Почта</span>
        </label>
        <label class="ui-input_inner">
            <input type="password" class="ui-input__item" id="password_register" required>
            <span class="ui-input__name">Пароль</span>
        </label>
        <label class="ui-input_inner">
            <input type="password" class="ui-input__item" id="repeat_register" required>
            <span class="ui-input__name">Повтор пароля</span>
        </label>
        <button class="ui-button" id="button_register">Регистрация</button>
        <p class="form-error" id="error_register"></p>
    </form>
    <button class="modal-action__link item-link" id="button_modal" data-path="login">Вход</button>
</section>
<!-- //register -->