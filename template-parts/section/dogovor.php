<section class="section section--dogovor" id="dogovor">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo $args['title'] ?></h2>
            </div>
            <?php if (! empty($args['subtitle'])) : ?>
                <div class="section__desc"><?php echo $args['subtitle'] ?></div>
            <?php endif; ?>
            <div class="section__content">
                <div class="dogovor">
                    <div class="dogovor__wrapper">
                        <div class="dogovor__steps">
                            <div class="dogovor__step">
                                <div class="dogovor__step-figure">1</div>
                                <div class="dogovor__step-text">Заполните<br> и отправьте анкету</div>
                            </div>
                            <div class="dogovor__step">
                                <div class="dogovor__step-figure">2</div>
                                <div class="dogovor__step-text">Дождитесь обратного звонока менеджера</div>
                            </div>
                            <div class="dogovor__step">
                                <div class="dogovor__step-figure">3</div>
                                <div class="dogovor__step-text">Обсудите условия и подпишите договор</div>
                            </div>
                        </div>
                        <div class="dogovor__app" id="dogovor-app">
                            <form class="dogovor__form" ref="form" @submit.prevent>
                                <div class="dogovor__side">
                                    <div class="dogovor__sticky">
                                        <div class="dogovor__subtitle">Лицо</div>
                                        <label class="field field--checkbox">
                                            <input type="radio" name="person" value="Юридическое лицо" v-model="type">
                                            <span class="field__checkbox"></span>
                                            <span class="field__label">Юридическое лицо</span>
                                        </label>
                                        <label class="field field--checkbox">
                                            <input type="radio" name="person" value="Индивидуальный предприниматель" v-model="type">
                                            <span class="field__checkbox"></span>
                                            <span class="field__label">Индивидуальный предприниматель</span>
                                        </label>
                                        <label class="field field--checkbox">
                                            <input type="radio" name="person" value="Самозанятый гражданин" v-model="type">
                                            <span class="field__checkbox"></span>
                                            <span class="field__label">Самозанятый гражданин</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="dogovor__content">
                                    <div class="dogovor__section" v-if="isSelf">
                                        <div class="dogovor__subtitle">ИНН</div>
                                        <div class="dogovor__row">
                                            <div class="field">
                                                <div class="field__label">ИНН</div>
                                                <input type="text" name="inn" class="field__input" placeholder="Введите номер" data-required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dogovor__section" v-if="isSelf">
                                        <div class="dogovor__subtitle">Данные</div>
                                        <div class="dogovor__row">
                                            <div class="field">
                                                <div class="field__label">ФИО</div>
                                                <input type="text" name="name" class="field__input" data-required>
                                            </div>
                                            <div class="field">
                                                <div class="field__label">Дата рождения</div>
                                                <input type="text" class="field__input" name="date_birth" data-required>
                                            </div>
                                        </div>
                                        <div class="dogovor__row">
                                            <div class="field">
                                                <div class="field__label">Телефон</div>
                                                <input type="text" class="field__input" placeholder="Введите номер" name="phone" data-required>
                                            </div>
                                            <div class="field">
                                                <div class="field__label">E-mail</div>
                                                <input type="text" class="field__input" placeholder="Укажите e-mail" name="email" data-required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dogovor__section">
                                        <div class="dogovor__subtitle" v-if="isSelf">Паспорт</div>
                                        <div class="dogovor__subtitle" v-else>Данные</div>
                                        <div class="dogovor__row" v-if="!isSelf">
                                            <div class="field" v-if="!isSelf">
                                                <div class="field__label" v-if="isLegal">Наименование</div>
                                                <div class="field__label" v-else>ФИО (индивидуального предпринимателя)</div>
                                                <input type="text" name="name" class="field__input" placeholder="Введите название" data-required>
                                            </div>
                                            <div class="field">
                                                <div class="field__label">ИНН</div>
                                                <input type="text" name="inn" class="field__input" placeholder="Введите номер" data-required>
                                            </div>
                                        </div>
                                        <div class="dogovor__row" v-if="!isSelf">
                                            <div class="field">
                                                <div class="field__label">Юридический адрес</div>
                                                <input type="text" name="address_legal" class="field__input" placeholder="Введите адрес" data-required>
                                            </div>
                                            <div class="field" v-if="otherAddress == 'Да'">
                                                <div class="field__label">Фактический адрес</div>
                                                <input type="text" name="address_fact" class="field__input" placeholder="Город, улица, дом/офис" data-required>
                                            </div>
                                        </div>
                                        <div class="dogovor__row" v-if="!isSelf">
                                            <div class="field">
                                                <div class="field__label">Фактический адрес отличается?</div>

                                                <div class="field__radios">
                                                    <label class="field field--checkbox">
                                                        <input type="radio" name="otherAddress" value="Да" v-model="otherAddress">
                                                        <span class="field__checkbox"></span>
                                                        <span class="field__label">Отличается</span>
                                                    </label>
                                                    <label class="field field--checkbox">
                                                        <input type="radio" name="otherAddress" value="Нет" v-model="otherAddress">
                                                        <span class="field__checkbox"></span>
                                                        <span class="field__label">Не отличается</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dogovor__row" v-if="isLegal">
                                            <div class="field">
                                                <div class="field__label">Номер свидетельства (необязательно)</div>
                                                <input type="text" class="field__input" placeholder="Введите номер" name="number_license">
                                            </div>
                                            <div class="field">
                                                <div class="field__label">Дата выдачи свидельства (необязательно)</div>
                                                <input type="text" class="field__input" placeholder="Выберите дату" name="date_license">
                                            </div>
                                        </div>
                                        <div class="dogovor__row" v-if="!isSelf">
                                            <div class="field">
                                                <div class="field__label">БИК банка</div>
                                                <input type="text" class="field__input" placeholder="Введите БИК" data-required name="bik">
                                            </div>
                                            <div class="field">
                                                <div class="field__label">Расчетный счет</div>
                                                <input type="text" class="field__input" placeholder="Введите номер" data-required name="payment">
                                            </div>
                                        </div>
                                        <div class="dogovor__row" v-if="!isSelf">
                                            <div class="field">
                                                <div class="field__label">ФИО заполнителя анкеты</div>
                                                <input type="text" class="field__input" name="fio_anketa">
                                            </div>
                                            <div class="field" v-if="isLegal">
                                                <div class="field__label">ФИО директора</div>
                                                <input type="text" class="field__input" name="fio_director">
                                            </div>
                                        </div>

                                        <div class="dogovor__row" v-if="isLegal">
                                            <div class="field">
                                                <div class="field__label">Основания действий директора</div>
                                                <input type="text" class="field__input" value="Устав" name="base_director">
                                            </div>
                                        </div>

                                        <div class="dogovor__row" v-if="!isSelf">
                                            <div class="field">
                                                <div class="field__label">Телефон</div>
                                                <input type="text" class="field__input" placeholder="Введите номер" data-required name="phone">
                                            </div>
                                            <div class="field">
                                                <div class="field__label">E-mail</div>
                                                <input type="text" class="field__input" placeholder="Укажите e-mail" data-required name="email">
                                            </div>
                                        </div>

                                        <div class="dogovor__row" v-if="isSelf">
                                            <div class="field">
                                                <div class="field__label">Серия и номер паспорта</div>
                                                <input type="text" class="field__input" placeholder="Введите серию и номер паспорта" data-required name="passport_number">
                                            </div>
                                            <div class="field">
                                                <div class="field__label">Дата выдачи паспорта</div>
                                                <input type="text" class="field__input" placeholder="Выберите дату" data-required name="passport_date">
                                            </div>
                                        </div>

                                        <div class="dogovor__row" v-if="isSelf">
                                            <div class="field">
                                                <div class="field__label">Кем выдан паспорт</div>
                                                <input type="text" class="field__input" data-required name="passport_point">
                                            </div>
                                            <div class="field">
                                                <div class="field__label">Адрес регистрации</div>
                                                <input type="text" class="field__input" placeholder="Введите адрес" data-required name="passport_address">
                                            </div>
                                        </div>

                                        <div class="dogovor__row">
                                            <div class="field">
                                                <div class="field__label">Интернет-магазин?</div>

                                                <div class="field__radios">
                                                    <label class="field field--checkbox">
                                                        <input type="radio" name="isShop" value="Да" v-model="isShop">
                                                        <span class="field__checkbox"></span>
                                                        <span class="field__label">Да</span>
                                                    </label>
                                                    <label class="field field--checkbox">
                                                        <input type="radio" name="isShop" value="Нет" v-model="isShop">
                                                        <span class="field__checkbox"></span>
                                                        <span class="field__label">Нет</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dogovor__row" v-if="isSelf && isShop == 'Да'">
                                            <div class="field">
                                                <div class="field__label">БИК банка</div>
                                                <input type="number" class="field__input" placeholder="Введите БИК" data-required name="bik">
                                            </div>
                                            <div class="field">
                                                <div class="field__label">Расчетный счет</div>
                                                <input type="text" class="field__input" placeholder="Введите номер" data-required name="payment">
                                            </div>
                                        </div>

                                        <div class="dogovor__row" v-if="isShop == 'Да'">
                                            <div class="field">
                                                <div class="field__label">Адрес сайта</div>
                                                <input type="text" class="field__input" placeholder="Введите ссылку" name="link">
                                            </div>
                                        </div>
                                        <div class="dogovor__row">
                                            <div class="field">
                                                <div class="field__label">Комментарий (не обязательно)</div>
                                                <textarea name="comments" class="field__textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dogovor__section">
                                        <div class="dogovor__subtitle">Адрес пункта выдачи СДЭК для возврата посылок</div>
                                        <div class="dogovor__row">
                                            <div class="field">
                                                <div class="field__label">Город</div>
                                                <input type="text" class="field__input" placeholder="Введите город" data-required name="point_city" v-model="cityPoint">
                                            </div>
                                        </div>
                                        <div class="dogovor__row" v-if="showMap">
                                            <div class="field">
                                                <div class="field__label">Адрес пункта выдачи</div>
                                                <div class="field__empty" v-if="!addressPoint"><?php get_svg('/icons/warning-circle-duotone.svg') ?>Пункт выдачи не выбран</div>
                                                <div class="field__good" v-else><?php get_svg('/icons/check-circle-duotone.svg') ?>{{ addressPoint }}</div>
                                                <span v-if="addressPoint" class="edit-point" @click="editPointAddress">Изменить</span>
                                                <input type="text" name="point_address" class="address-point" v-model="addressPoint" data-required="point">
                                            </div>
                                        </div>

                                        <div class="dogovor__row map" v-if="showMap">
                                            <div class="dogovor__map">
                                                <div class="dogovor__loader" v-if="loader">
                                                    <div class="spinner"></div>
                                                    <div class="dogovor__loader-text">Ищем пункты выдачи...</div>
                                                </div>
                                                <div class="dogovor__map-title">Выберите пункт выдачи на карте</div>
                                                <div id="points-map"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form__privacy">
                                        <label class="field field--checkbox">
                                            <input type="checkbox" class="agreement">
                                            <span class="field__checkbox"></span>
                                            <span class="field__label">Даю свое <a href="<?php echo home_url('/agreement/') ?>" target="_blank">согласие на обработку персональный данных</a> в соответствии с <a href="<?php echo get_privacy_policy_url() ?>" target="_blank">Политикой конфиденциальности</a></span>
                                        </label>
                                    </div>
                                    <div class="dogovor__button">
                                        <button class="button button--fill button--green" @click="submit">Отправить анкету</button>
                                    </div>
                                </div>
                                <input type="hidden" name="utm_source" value="<?php echo get_utm('utm_source') ?>">
                                <input type="hidden" name="utm_medium" value="<?php echo get_utm('utm_medium') ?>">
                                <input type="hidden" name="utm_campaign" value="<?php echo get_utm('utm_campaign') ?>">
                                <input type="hidden" name="utm_content" value="<?php echo get_utm('utm_content') ?>">
                                <input type="hidden" name="utm_term" value="<?php echo get_utm('utm_term') ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>