<div class="popup" id="popup-validate">
    <div class="popup__wrapper">
        <div class="popup__text"><?php echo __( 'Пожалуйста, заполните все обязательные поля', 'icdek' ) ?>!</div>
    </div>
</div>

<div class="popup" id="popup-success-dogovor">
    <div class="popup__wrapper">
        <div class="popup__title"><?php echo __( 'Анкета отправлена', 'icdek' ) ?>!</div>
        <div class="popup__text"><?php echo __( 'Мы изучим информацию и свяжемся с вами в ближайшее время', 'icdek' ) ?>.</div>
    </div>
</div>

<div class="popup" id="popup-success-form">
    <div class="popup__wrapper">
        <div class="popup__title"><?php echo __( 'Заявка отправлена', 'icdek' ) ?>!</div>
        <div class="popup__text"><?php echo __( 'Мы изучим информацию и свяжемся с вами в ближайшее время', 'icdek' ) ?>.</div>
    </div>
</div>

<div class="popup" id="popup-marketplace">
    <div class="popup__wrapper">
        <div class="popup__title"><?php echo __( 'Рассчитайте стоимость доставки на маркетплейс', 'icdek' ) ?></div>
        <div class="popup__text"><?php echo __( 'Оставьте заявку, и наши менеджеры свяжутся с Вами в течение 15 минут', 'icdek' ) ?></div>
        <form class="popup__form form" id="form-marketplace">
            <input type="hidden" name="subject" value="Расчет доставки на маркетплейс">
            <div class="field">
                <input type="text" name="name" class="field__input" placeholder="<?php echo __( 'Введите ваше имя', 'icdek' ) ?>" data-required>
            </div>
            <div class="field">
                <input type="text" name="phone" class="field__input" placeholder="<?php echo __( 'Введите номер телефона', 'icdek' ) ?>" data-required>
            </div>
            <div class="field">
                <div class="field__label"><?php echo __( 'Выберите маркетплейс', 'icdek' ) ?></div>
                <select name="marketplace" class="field__select">
                    <option value="Wilbberries">Wilbberries</option>
                    <option value="Ozon">Ozon</option>
                    <option value="Яндекс Маркет">Яндекс Маркет</option>
                    <option value="Мегамаркет">Мегамаркет</option>
                    <option value="Другой"><?php echo __( 'Другой', 'icdek' ) ?></option>
                </select>
            </div>
            <div class="field" data-field-condition="marketplace=Другой">
                <input type="text" name="other_marketplace" class="field__input" placeholder="<?php echo __( 'Введите название маркетплейса', 'icdek' ) ?>" data-required>
            </div>
            <div class="form__privacy">
                <label class="field field--checkbox">
                    <input type="checkbox" class="agreement">
                    <span class="field__checkbox"></span>
                    <span class="field__label"><?php echo __( 'Даю свое', 'icdek' ) ?> <a href="<?php echo home_url('/agreement/') ?>" target="_blank"><?php echo __( 'согласие на обработку персональный данных', 'icdek' ) ?></a> <?php echo __( 'в соответствии с', 'icdek' ) ?> <a href="<?php echo get_privacy_policy_url() ?>" target="_blank"><?php echo __( 'Политикой конфиденциальности', 'icdek' ) ?></a></span>
                </label>
            </div>
            <div class="form__button">
                <button class="button button--fill button--green"><?php echo __( 'Отправить', 'icdek' ) ?></button>
            </div>
            <input type="hidden" name="utm_source" value="<?php echo get_utm( 'utm_source' ) ?>">
            <input type="hidden" name="utm_medium" value="<?php echo get_utm( 'utm_medium' ) ?>">
            <input type="hidden" name="utm_campaign" value="<?php echo get_utm( 'utm_campaign' ) ?>">
            <input type="hidden" name="utm_content" value="<?php echo get_utm( 'utm_content' ) ?>">
            <input type="hidden" name="utm_term" value="<?php echo get_utm( 'utm_term' ) ?>">
        </form>
    </div>
</div>

<div class="popup" id="popup-request">
    <div class="popup__wrapper">
        <div class="popup__title"><?php echo __( 'Обсудить условия', 'icdek' ) ?></div>
        <div class="popup__text"><?php echo __( 'Оставьте заявку, и наши менеджеры свяжутся с Вами в течение 15 минут', 'icdek' ) ?></div>
        <form class="popup__form form" id="form-request">
        <input type="hidden" name="subject" value="Обсудить условия">
            <div class="field">
                <input type="text" name="name" class="field__input" placeholder="<?php echo __( 'Введите ваше имя', 'icdek' ) ?>" data-required>
            </div>
            <div class="field">
                <input type="text" name="phone" class="field__input" placeholder="<?php echo __( 'Введите номер телефона', 'icdek' ) ?>" data-required>
            </div>
            <div class="form__privacy">
                <label class="field field--checkbox">
                    <input type="checkbox" class="agreement">
                    <span class="field__checkbox"></span>
                    <span class="field__label"><?php echo __( 'Даю свое', 'icdek' ) ?> <a href="<?php echo home_url('/agreement/') ?>" target="_blank"><?php echo __( 'согласие на обработку персональный данных', 'icdek' ) ?></a> <?php echo __( 'в соответствии с', 'icdek' ) ?> <a href="<?php echo get_privacy_policy_url() ?>" target="_blank"><?php echo __( 'Политикой конфиденциальности', 'icdek' ) ?></a></span>
                </label>
            </div>
            <div class="form__button">
                <button class="button button--fill button--green"><?php echo __( 'Отправить', 'icdek' ) ?></button>
            </div>
            <input type="hidden" name="utm_source" value="<?php echo get_utm( 'utm_source' ) ?>">
            <input type="hidden" name="utm_medium" value="<?php echo get_utm( 'utm_medium' ) ?>">
            <input type="hidden" name="utm_campaign" value="<?php echo get_utm( 'utm_campaign' ) ?>">
            <input type="hidden" name="utm_content" value="<?php echo get_utm( 'utm_content' ) ?>">
            <input type="hidden" name="utm_term" value="<?php echo get_utm( 'utm_term' ) ?>">
        </form>
    </div>
</div>

<div class="popup" id="popup-consultation">
    <div class="popup__wrapper">
        <div class="popup__title"><?php echo __( 'Получить консультацию', 'icdek' ) ?></div>
        <div class="popup__text"><?php echo __( 'Оставьте заявку, и наши менеджеры свяжутся с Вами в течение 15 минут', 'icdek' ) ?></div>
        <form class="popup__form form" id="form-consultation">
        <input type="hidden" name="subject" value="Получить консультацию">
            <div class="field">
                <input type="text" name="name" class="field__input" placeholder="<?php echo __( 'Введите ваше имя', 'icdek' ) ?>" data-required>
            </div>
            <div class="field">
                <input type="text" name="phone" class="field__input" placeholder="<?php echo __( 'Введите номер телефона', 'icdek' ) ?>" data-required>
            </div>
            <div class="form__privacy">
                <label class="field field--checkbox">
                    <input type="checkbox" class="agreement">
                    <span class="field__checkbox"></span>
                    <span class="field__label"><?php echo __( 'Даю свое', 'icdek' ) ?> <a href="<?php echo home_url('/agreement/') ?>" target="_blank"><?php echo __( 'согласие на обработку персональный данных', 'icdek' ) ?></a> <?php echo __( 'в соответствии с', 'icdek' ) ?> <a href="<?php echo get_privacy_policy_url() ?>" target="_blank"><?php echo __( 'Политикой конфиденциальности', 'icdek' ) ?></a></span>
                </label>
            </div>
            <div class="form__button">
                <button class="button button--fill button--green"><?php echo __( 'Отправить', 'icdek' ) ?></button>
            </div>
            <input type="hidden" name="utm_source" value="<?php echo get_utm( 'utm_source' ) ?>">
            <input type="hidden" name="utm_medium" value="<?php echo get_utm( 'utm_medium' ) ?>">
            <input type="hidden" name="utm_campaign" value="<?php echo get_utm( 'utm_campaign' ) ?>">
            <input type="hidden" name="utm_content" value="<?php echo get_utm( 'utm_content' ) ?>">
            <input type="hidden" name="utm_term" value="<?php echo get_utm( 'utm_term' ) ?>">
        </form>
    </div>
</div>