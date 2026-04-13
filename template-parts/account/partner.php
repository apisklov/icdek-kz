<div class="account-widget">
    <div class="account-widget__title">
        <div class="heading heading--level-4">Партнерский раздел</div>
    </div>
    <div class="account-widget__content">
        <?php if (get_current_user_id() && get_partner_id( get_current_user_id() )) : ?>
            <div class="account-partner">
                <div class="account-partner__wrapper">
                    <div class="account-partner__content">
                        <div class="account-partner__id">
                            <div class="field">
                                <div class="field__label">Ваш партнерский ID:</div>
                                <span><?php echo get_partner_id(get_current_user_id()) ?></span>
                            </div>
                        </div>
                        <div class="account-partner__link">
                            <div class="field">
                                <div class="field__label">Партнерская ссылка:</div>
                                <div class="field__generate">
                                    <input type="text" value="<?php echo get_partner_link(get_current_user_id()) ?>" id="partner-link-generate">
                                    <div class="js-field-copy">
                                        <?php include get_theme_file_path('/assets/icons/account/copy.svg') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="account-partner__info">
                                Вы можете сгенерировать ссылку и QR-код для любой страницы сайта. Вставьте url нужной страницы и дождитесь обновления QR-кода.
                            </div>
                        </div>
                        <div class="account-partner__qr">
                            <div class="field">
                                <div class="field__label">QR-код с партнерской ссылкой:</div>
                                <div class="qr-image"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>