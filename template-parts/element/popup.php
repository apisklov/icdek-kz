<div class="popup" id="popup-validate">
    <div class="popup__wrapper">
        <div class="popup__text">Пожалуйста, заполните все обязательные поля!</div>
    </div>
</div>

<div class="popup" id="popup-success-dogovor">
    <div class="popup__wrapper">
        <div class="popup__title">Анкета отправлена!</div>
        <div class="popup__text">Мы изучим информацию и свяжемся с вами в ближайшее время.</div>
    </div>
</div>

<div class="popup" id="popup-success-form">
    <div class="popup__wrapper">
        <div class="popup__title">Заявка отправлена!</div>
        <div class="popup__text">Мы изучим информацию и свяжемся с вами в ближайшее время.</div>
    </div>
</div>

<div class="popup" id="popup-marketplace">
    <div class="popup__wrapper">
        <div class="popup__title">Рассчитайте стоимость доставки на маркетплейс</div>
        <div class="popup__text">Оставьте заявку, и наши менеджеры свяжутся с Вами в течение 15 минут</div>
        <form class="popup__form form" id="form-marketplace">
            <input type="hidden" name="subject" value="Расчет доставки на маркетплейс">
            <div class="field">
                <input type="text" name="name" class="field__input" placeholder="Введите ваше имя" data-required>
            </div>
            <div class="field">
                <input type="text" name="phone" class="field__input" placeholder="Введите номер телефона" data-required>
            </div>
            <div class="field">
                <div class="field__label">Выберите маркетплейс</div>
                <select name="marketplace" class="field__select">
                    <option value="Wilbberries">Wilbberries</option>
                    <option value="Ozon">Ozon</option>
                    <option value="Яндекс Маркет">Яндекс Маркет</option>
                    <option value="Мегамаркет">Мегамаркет</option>
                    <option value="Другой">Другой</option>
                </select>
            </div>
            <div class="field" data-field-condition="marketplace=Другой">
                <input type="text" name="other_marketplace" class="field__input" placeholder="Введите название маркетплейса" data-required>
            </div>
            <div class="form__privacy">
                <label class="field field--checkbox">
                    <input type="checkbox" class="agreement">
                    <span class="field__checkbox"></span>
                    <span class="field__label">Даю свое <a href="<?php echo home_url( '/agreement/' ) ?>" target="_blank">согласие на обработку персональный данных</a> в соответствии с <a href="<?php echo get_privacy_policy_url() ?>" target="_blank">Политикой конфиденциальности</a></span>
                </label>
            </div>
            <div class="form__button">
                <button class="button button--fill button--green">Отправить</button>
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
        <div class="popup__title">Обсудить условия</div>
        <div class="popup__text">Оставьте заявку, и наши менеджеры свяжутся с Вами в течение 15 минут</div>
        <form class="popup__form form" id="form-request">
        <input type="hidden" name="subject" value="Обсудить условия">
            <div class="field">
                <input type="text" name="name" class="field__input" placeholder="Введите ваше имя" data-required>
            </div>
            <div class="field">
                <input type="text" name="phone" class="field__input" placeholder="Введите номер телефона" data-required>
            </div>
            <div class="form__privacy">
                <label class="field field--checkbox">
                    <input type="checkbox" class="agreement">
                    <span class="field__checkbox"></span>
                    <span class="field__label">Даю свое <a href="<?php echo home_url( '/agreement/' ) ?>" target="_blank">согласие на обработку персональный данных</a> в соответствии с <a href="<?php echo get_privacy_policy_url() ?>" target="_blank">Политикой конфиденциальности</a></span>
                </label>
            </div>
            <div class="form__button">
                <button class="button button--fill button--green">Отправить</button>
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
        <div class="popup__title">Получить консультацию</div>
        <div class="popup__text">Оставьте заявку, и наши менеджеры свяжутся с Вами в течение 15 минут</div>
        <form class="popup__form form" id="form-consultation">
        <input type="hidden" name="subject" value="Получить консультацию">
            <div class="field">
                <input type="text" name="name" class="field__input" placeholder="Введите ваше имя" data-required>
            </div>
            <div class="field">
                <input type="text" name="phone" class="field__input" placeholder="Введите номер телефона" data-required>
            </div>
            <div class="form__privacy">
                <label class="field field--checkbox">
                    <input type="checkbox" class="agreement">
                    <span class="field__checkbox"></span>
                    <span class="field__label">Даю свое <a href="<?php echo home_url( '/agreement/' ) ?>" target="_blank">согласие на обработку персональный данных</a> в соответствии с <a href="<?php echo get_privacy_policy_url() ?>" target="_blank">Политикой конфиденциальности</a></span>
                </label>
            </div>
            <div class="form__button">
                <button class="button button--fill button--green">Отправить</button>
            </div>
            <input type="hidden" name="utm_source" value="<?php echo get_utm( 'utm_source' ) ?>">
            <input type="hidden" name="utm_medium" value="<?php echo get_utm( 'utm_medium' ) ?>">
            <input type="hidden" name="utm_campaign" value="<?php echo get_utm( 'utm_campaign' ) ?>">
            <input type="hidden" name="utm_content" value="<?php echo get_utm( 'utm_content' ) ?>">
            <input type="hidden" name="utm_term" value="<?php echo get_utm( 'utm_term' ) ?>">
        </form>
    </div>
</div>