<div class="account-widget">
    <div class="account-widget__title">
        <div class="heading heading--level-4">Личные данные</div>
    </div>
    <div class="account-widget__content">
        <div class="account-settings">
            <div class="account-settings__wrapper">
                <div class="account-settings__notice"></div>
                <form class="account-settings__form form" id="account-settings-form">
                    <?php wp_nonce_field('account_settings') ?>
                    <div class="field">
                        <div class="field__label">ФИО</div>
                        <input class="field__input" type="text" name="display_name" value="<?php echo esc_attr($args['name']) ?>" data-required>
                    </div>
                    <div class="field">
                        <div class="field__label">Логин</div>
                        <input type="text" name="user_login" class="field__input" readonly disabled value="<?php echo esc_attr($args['login']) ?>">
                    </div>
                    <div class="field">
                        <div class="field__label">E-mail</div>
                        <input type="text" name="user_email" class="field__input" value="<?php echo esc_attr($args['email']) ?>" data-required>
                    </div>
                    <div class="field">
                        <a href="#" class="account-settings__password js-show-password-field">Сменить пароль</a>
                    </div>
                    <div class="field is-hide">
                        <div class="field__label">Старый пароль</div>
                        <div class="field__password">
                            <input type="password" name="old_password" class="field__input">
                            <div class="js-open-password">
                                <div class="open"><?php include get_theme_file_path('/assets/icons/account/eye.svg') ?></div>
                                <div class="close"><?php include get_theme_file_path('/assets/icons/account/eye-hide.svg') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-hide">
                        <div class="field__label">Новый пароль</div>
                        <div class="field__password">
                            <input type="password" name="new_password" class="field__input">
                            <div class="js-open-password">
                                <div class="open"><?php include get_theme_file_path('/assets/icons/account/eye.svg') ?></div>
                                <div class="close"><?php include get_theme_file_path('/assets/icons/account/eye-hide.svg') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-hide">
                        <div class="field__label">Повторите новый пароль</div>
                        <div class="field__password">
                            <input type="password" name="confirm_password" class="field__input">
                            <div class="js-open-password">
                                <div class="open"><?php include get_theme_file_path('/assets/icons/account/eye.svg') ?></div>
                                <div class="close"><?php include get_theme_file_path('/assets/icons/account/eye-hide.svg') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="field__label">Город</div>
                        <input type="text" name="city" class="field__input" value="<?php echo esc_attr($args['city']) ?>">
                    </div>
                    <div class="form__submit">
                        <button class="button button--big button--fill button--green" disabled>Сохранить</button>
                    </div>
                    <div class="account-settings__loader">
                        <div class="spinner"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>