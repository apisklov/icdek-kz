<div class="account-login">
    <div class="account-login__wrapper">
        <div class="account-login__title">
            <div class="heading heading--level-4">Войти в личный кабинет</div>
        </div>
        <div class="account-login__form">
            <form id="account-login-form" class="form">
                <input type="hidden" name="action" value="account_login">
                <div class="field">
                    <div class="field__label">Имя пользователя или e-mail</div>
                    <input type="text" name="email" class="field__input" data-required>
                </div>
                <div class="field">
                    <div class="field__label">Пароль</div>
                    <div class="field__password">
                        <input type="password" name="password" class="field__input" data-required>
                        <div class="js-open-password">
                            <div class="open"><?php include get_theme_file_path('/assets/icons/account/eye.svg') ?></div>
                            <div class="close"><?php include get_theme_file_path('/assets/icons/account/eye-hide.svg') ?></div>
                        </div>
                    </div>
                </div>
                <label class="field field--checkbox">
                    <input type="checkbox" name="rememberme" checked>
                    <span class="field__checkbox"></span>
                    <span class="field__label">Запомнить меня</span>
                </label>
                <div class="form__button">
                    <button class="button button--big button--green button--fill">Войти</button>
                </div>
            </form>
        </div>
        <div class="account-login__notice"></div>
        <div class="account-login__loader">
            <div class="spinner"></div>
        </div>
    </div>
</div>