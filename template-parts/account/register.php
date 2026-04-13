<div class="account-register">
    <div class="account-register__wrapper">
        <div class="account-register__title">
            <div class="heading heading--level-4">Регистрация участника</div>
        </div>
        <div class="account-register__form">
            <form id="account-register-form" class="form">
                <input type="hidden" name="action" value="account_register">
                <?php wp_nonce_field( 'account_register' ) ?>
                <div class="field">
                    <div class="field__label">ФИО участника</div>
                    <input type="text" name="name" class="field__input" data-required>
                </div>
                <div class="field">
                    <div class="field__label">E-mail</div>
                    <input type="text" name="email" class="field__input" data-required>
                </div>
                <div class="field">
                    <div class="field__label">Пароль</div>
                    <div class="field__password">
                        <input type="password" name="password" class="field__input" id="password" data-required>
                        <div class="js-open-password">
                            <div class="open"><?php include get_theme_file_path('/assets/icons/account/eye.svg') ?></div>
                            <div class="close"><?php include get_theme_file_path('/assets/icons/account/eye-hide.svg') ?></div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="field__label">Город</div>
                    <input type="text" name="city" class="field__input" data-required>
                </div>
                <div class="field">
                    <div class="field__label">Если Вы не хотите участвовать в программе то, пожалуйста, напишите нам причину, чтобы мы могли проанализировать и улучшить программу.</div>
                    <textarea name="answer" class="field__textarea"></textarea>
                </div>
                <div class="form__button">
                    <button class="button button--big button--green button--fill">Зарегистрироваться</button>
                </div>
            </form>
        </div>
        <div class="account-register__loader">
            <div class="spinner"></div>
        </div>
        <div class="account-register__notice"></div>
    </div>
</div>