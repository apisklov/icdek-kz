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
                        <?php if ($args['form'] == 'dogovor') : ?>
                            <div class="dogovor__steps">
                                <div class="dogovor__step">
                                    <div class="dogovor__step-figure">1</div>
                                    <div class="dogovor__step-text"><?php echo __('Заполните<br> и отправьте анкету', 'icdek') ?></div>
                                </div>
                                <div class="dogovor__step">
                                    <div class="dogovor__step-figure">2</div>
                                    <div class="dogovor__step-text"><?php echo __('Дождитесь обратного звонка менеджера', 'icdek') ?></div>
                                </div>
                                <div class="dogovor__step">
                                    <div class="dogovor__step-figure">3</div>
                                    <div class="dogovor__step-text"><?php echo __('Обсудите условия и подпишите договор', 'icdek') ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($args['form'] == 'dogovor') : ?>
                            <div class="dogovor__app" id="dogovor-app">
                                <form class="dogovor__form" ref="form" @submit.prevent>
                                    <div class="dogovor__side">
                                        <div class="dogovor__sticky">
                                            <div class="dogovor__subtitle"><?php echo __('Лицо', 'icdek') ?></div>
                                            <label class="field field--checkbox">
                                                <input type="radio" name="person" value="Юридическое лицо" v-model="type">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('Юридическое лицо', 'icdek') ?></span>
                                            </label>
                                            <label class="field field--checkbox">
                                                <input type="radio" name="person" value="Индивидуальный предприниматель" v-model="type">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('Индивидуальный предприниматель', 'icdek') ?></span>
                                            </label>
                                            <label class="field field--checkbox">
                                                <input type="radio" name="person" value="Самозанятый гражданин" v-model="type">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('Самозанятый гражданин', 'icdek') ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="dogovor__content">
                                        <div class="dogovor__section" v-if="isSelf">
                                            <div class="dogovor__subtitle"><?php echo __('ИНН', 'icdek') ?></div>
                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('ИНН', 'icdek') ?></div>
                                                    <input type="text" name="inn" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" data-required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dogovor__section" v-if="isSelf">
                                            <div class="dogovor__subtitle"><?php echo __('Данные', 'icdek') ?></div>
                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('ФИО', 'icdek') ?></div>
                                                    <input type="text" name="name" class="field__input" data-required>
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Дата рождения', 'icdek') ?></div>
                                                    <input type="text" class="field__input" name="date_birth" data-required>
                                                </div>
                                            </div>
                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Телефон', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" name="phone" data-required>
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('E-mail', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Укажите e-mail', 'icdek') ?>" name="email" data-required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dogovor__section">
                                            <div class="dogovor__subtitle" v-if="isSelf"><?php echo __('Паспорт', 'icdek') ?></div>
                                            <div class="dogovor__subtitle" v-else><?php echo __('Данные', 'icdek') ?></div>
                                            <div class="dogovor__row" v-if="!isSelf">
                                                <div class="field" v-if="!isSelf">
                                                    <div class="field__label" v-if="isLegal"><?php echo __('Данные', 'icdek') ?></div>
                                                    <div class="field__label" v-else><?php echo __('ФИО (индивидуального предпринимателя)', 'icdek') ?></div>
                                                    <input type="text" name="name" class="field__input" placeholder="<?php echo __('Введите название', 'icdek') ?>" data-required>
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('ИНН', 'icdek') ?></div>
                                                    <input type="text" name="inn" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" data-required>
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="!isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Юридический адрес', 'icdek') ?></div>
                                                    <input type="text" name="address_legal" class="field__input" placeholder="<?php echo __('Введите адрес', 'icdek') ?>" data-required>
                                                </div>
                                                <div class="field" v-if="otherAddress == 'Да'">
                                                    <div class="field__label"><?php echo __('Фактический адрес', 'icdek') ?></div>
                                                    <input type="text" name="address_fact" class="field__input" placeholder="<?php echo __('Город, улица, дом/офис', 'icdek') ?>" data-required>
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="!isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Фактический адрес отличается', 'icdek') ?>?</div>

                                                    <div class="field__radios">
                                                        <label class="field field--checkbox">
                                                            <input type="radio" name="otherAddress" value="Да" v-model="otherAddress">
                                                            <span class="field__checkbox"></span>
                                                            <span class="field__label"><?php echo __('Отличается', 'icdek') ?></span>
                                                        </label>
                                                        <label class="field field--checkbox">
                                                            <input type="radio" name="otherAddress" value="Нет" v-model="otherAddress">
                                                            <span class="field__checkbox"></span>
                                                            <span class="field__label"><?php echo __('Не отличается', 'icdek') ?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="isLegal">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Номер свидетельства', 'icdek') ?> (<?php echo __('не обязательно', 'icdek') ?>)</div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" name="number_license">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Дата выдачи свидельства', 'icdek') ?> (<?php echo __('не обязательно', 'icdek') ?>)</div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Выберите дату', 'icdek') ?>" name="date_license">
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="!isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('БИК банка', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите БИК', 'icdek') ?>" data-required name="bik">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Расчетный счет', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" data-required name="payment">
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="!isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('ФИО заполнителя анкеты', 'icdek') ?></div>
                                                    <input type="text" class="field__input" name="fio_anketa">
                                                </div>
                                                <div class="field" v-if="isLegal">
                                                    <div class="field__label"><?php echo __('ФИО директора', 'icdek') ?></div>
                                                    <input type="text" class="field__input" name="fio_director">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isLegal">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Основания действий директора', 'icdek') ?></div>
                                                    <input type="text" class="field__input" value="Устав" name="base_director">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="!isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Телефон', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" data-required name="phone">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('E-mail', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Укажите e-mail', 'icdek') ?>" data-required name="email">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Серия и номер паспорта', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите серию и номер паспорта', 'icdek') ?>" data-required name="passport_number">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Дата выдачи паспорта', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Выберите дату', 'icdek') ?>" data-required name="passport_date">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isSelf">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Кем выдан паспорт', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="passport_point">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Адрес регистрации', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите адрес', 'icdek') ?>" data-required name="passport_address">
                                                </div>
                                            </div>

                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Интернет-магазин', 'icdek') ?>?</div>

                                                    <div class="field__radios">
                                                        <label class="field field--checkbox">
                                                            <input type="radio" name="isShop" value="Да" v-model="isShop">
                                                            <span class="field__checkbox"></span>
                                                            <span class="field__label"><?php echo __('Да', 'icdek') ?></span>
                                                        </label>
                                                        <label class="field field--checkbox">
                                                            <input type="radio" name="isShop" value="Нет" v-model="isShop">
                                                            <span class="field__checkbox"></span>
                                                            <span class="field__label"><?php echo __('Нет', 'icdek') ?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isSelf && isShop == 'Да'">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('БИК банка', 'icdek') ?></div>
                                                    <input type="number" class="field__input" placeholder="<?php echo __('Введите БИК', 'icdek') ?>" data-required name="bik">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Расчетный счет', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите номер', 'icdek') ?>" data-required name="payment">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isShop == 'Да'">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Адрес сайта', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите ссылку', 'icdek') ?>" name="link">
                                                </div>
                                            </div>
                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Комментарий', 'icdek') ?> (<?php echo __('не обязательно', 'icdek') ?>)</div>
                                                    <textarea name="comments" class="field__textarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dogovor__section">
                                            <div class="dogovor__subtitle"><?php echo __('Адрес пункта выдачи СДЭК для возврата посылок', 'icdek') ?></div>
                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Город', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Введите город', 'icdek') ?>" data-required name="point_city" v-model="cityPoint">
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="showMap">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Адрес пункта выдачи', 'icdek') ?></div>
                                                    <div class="field__empty" v-if="!addressPoint"><?php get_svg('/icons/warning-circle-duotone.svg') ?><?php echo __('Пункт выдачи не выбран', 'icdek') ?></div>
                                                    <div class="field__good" v-else><?php get_svg('/icons/check-circle-duotone.svg') ?>{{ addressPoint }}</div>
                                                    <span v-if="addressPoint" class="edit-point" @click="editPointAddress"><?php echo __('Изменить', 'icdek') ?></span>
                                                    <input type="text" name="point_address" class="address-point" v-model="addressPoint" data-required="point">
                                                </div>
                                            </div>

                                            <div class="dogovor__row map" v-if="showMap">
                                                <div class="dogovor__map">
                                                    <div class="dogovor__loader" v-if="loader">
                                                        <div class="spinner"></div>
                                                        <div class="dogovor__loader-text"><?php echo __('Ищем пункты выдачи', 'icdek') ?>...</div>
                                                    </div>
                                                    <div class="dogovor__map-title"><?php echo __('Выберите пункт выдачи на карте', 'icdek') ?></div>
                                                    <div id="points-map"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form__privacy">
                                            <label class="field field--checkbox">
                                                <input type="checkbox" class="agreement">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('Даю свое', 'icdek') ?> <a href="<?php echo home_url('/agreement/') ?>" target="_blank"><?php echo __('согласие на обработку персональный данных', 'icdek') ?></a> <?php echo __('в соответствии с', 'icdek') ?> <a href="<?php echo get_privacy_policy_url() ?>" target="_blank"><?php echo __('Политикой конфиденциальности', 'icdek') ?></a></span>
                                            </label>
                                        </div>
                                        <div class="dogovor__button">
                                            <button class="button button--fill button--green" @click="submit"><?php echo __('Отправить анкету', 'icdek') ?></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="utm_source" value="<?php echo get_utm('utm_source') ?>">
                                    <input type="hidden" name="utm_medium" value="<?php echo get_utm('utm_medium') ?>">
                                    <input type="hidden" name="utm_campaign" value="<?php echo get_utm('utm_campaign') ?>">
                                    <input type="hidden" name="utm_content" value="<?php echo get_utm('utm_content') ?>">
                                    <input type="hidden" name="utm_term" value="<?php echo get_utm('utm_term') ?>">
                                </form>
                            </div>
                        <?php elseif ($args['form'] == 'b2b') : ?>
                            <div class="dogovor__app" id="dogovor-b2b">
                                <form class="dogovor__form" ref="form" @submit.prevent>
                                    <div class="dogovor__side">
                                        <div class="dogovor__sticky">
                                            <div class="dogovor__subtitle"><?php echo __('Лицо', 'icdek') ?></div>
                                            <label class="field field--checkbox">
                                                <input type="radio" name="cargo" value="B2B-доставка груза до 200€" v-model="cargo">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('B2B-доставка груза до 200 €', 'icdek') ?></span>
                                            </label>
                                            <label class="field field--checkbox">
                                                <input type="radio" name="cargo" value="B2B-доставка груза свыше 200€" v-model="cargo">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('B2B-доставка груза свыше 200 €', 'icdek') ?></span>
                                            </label>
                                            <label class="field field--checkbox">
                                                <input type="radio" name="cargo" value="Доставка документов" v-model="cargo">
                                                <span class="field__checkbox"></span>
                                                <span class="field__label"><?php echo __('Доставка документов', 'icdek') ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="dogovor__content">
                                        <div class="dogovor__section">
                                            <div class="dogovor__subtitle"><?php echo __('Заявка', 'icdek') ?></div>
                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Страна отправления', 'icdek') ?></div>
                                                    <select data-required name="country_departure" class="field__select">
                                                        <option value="0" selected disabled>Выберите страну отправления</option>
                                                        <option value="Германия">Германия</option>
                                                        <option value="Италия">Италия</option>
                                                        <option value="Китай">Китай</option>
                                                        <option value="Республика Корея">Республика Корея</option>
                                                        <option value="Соединенное Королевство">Соединенное Королевство</option>
                                                        <option value="Соединенные Штаты">Соединенные Штаты</option>
                                                        <option value="Турция">Турция</option>
                                                        <option value="Узбекистан">Узбекистан</option>
                                                    </select>
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Адрес отправителя', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Индекс, страна, город, улица, дом', 'icdek') ?>" data-required name="address_departure">
                                                </div>
                                            </div>

                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Страна назначения', 'icdek') ?></div>
                                                    <select data-required name="country_destination" class="field__select">
                                                        <option value="0" selected disabled>Выберите страну назначения</option>
                                                        <option value="Казахстан">Казахстан</option>
                                                    </select>
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Адрес получателя', 'icdek') ?></div>
                                                    <input type="text" class="field__input" placeholder="<?php echo __('Индекс, страна, город, улица, дом', 'icdek') ?>" data-required name="address_destination">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="!isDocument">
                                                <div class="field" v-if="isBelow200">
                                                    <div class="field__label"><?php echo __('Цель транспортировки', 'icdek') ?></div>
                                                    <select data-required name="target" class="field__select">
                                                        <option value="0" selected disabled>Укажите цель транспортировки</option>
                                                        <option value="Для собственных нужд компании">Для собственных нужд компании</option>
                                                        <option value="Доставка">Доставка</option>
                                                        <option value="Образцы для последующей закупки товара">Образцы для последующей закупки товара</option>
                                                        <option value="Образцы для представительских целей">Образцы для представительских целей</option>
                                                        <option value="Образцы для сертификации">Образцы для сертификации</option>
                                                        <option value="Рекламные образцы (рекламные материалы)">Рекламные образцы (рекламные материалы)</option>
                                                    </select>
                                                </div>
                                                <div class="field" v-if="isMore200">
                                                    <div class="field__label"><?php echo __('Цель транспортировки', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="target">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="!isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('ФИО контактного лица', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="name">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('E-mail контактного лица', 'icdek') ?></div>
                                                    <input type="text" class="field__input" name="email">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="!isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Телефон контактного лица', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="phone">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Наименование компании', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="company">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="!isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('БИН/ИИН', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="inn">
                                                </div>
                                            </div>

                                            <div class="dogovor__row single" v-if="!isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Описание товара', 'icdek') ?></div>
                                                    <textarea name="desc" class="field__textarea" placeholder="<?php echo __('Максимально подробно: наименование, торговая марка, назначение, материал, технические характеристики.', 'icdek') ?>"  data-required></textarea>
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="!isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Ссылка на товар в интернете', 'icdek') ?></div>
                                                    <input type="text" class="field__input" name="link">
                                                </div>
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Стоимость', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="price" placeholder="<?php echo __('Согласно заявленной в инвойсе', 'icdek') ?>">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Контактные данные', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="data_contact" placeholder="<?php echo __('ФИО, email, номер телефона', 'icdek') ?>">
                                                </div>
                                            </div>
                                            <div class="dogovor__row" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Вы являетесь', 'icdek') ?></div>

                                                    <div class="field__radios">
                                                        <label class="field field--checkbox">
                                                            <input type="radio" name="type" value="получатель" checked>
                                                            <span class="field__checkbox"></span>
                                                            <span class="field__label"><?php echo __('Получателем', 'icdek') ?></span>
                                                        </label>
                                                        <label class="field field--checkbox">
                                                            <input type="radio" name="type" value="отправитель">
                                                            <span class="field__checkbox"></span>
                                                            <span class="field__label"><?php echo __('Отправителем', 'icdek') ?></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Тип доставки', 'icdek') ?></div>
                                                    <select data-required name="type_delivery" class="field__select">
                                                        <option value="0" selected disabled>Выберите вариант из списка</option>
                                                        <option value="От физического лица физическому лицу">От физического лица физическому лицу</option>
                                                        <option value="От юридического лица юридическому лицу">От юридического лица юридическому лицу</option>
                                                        <option value="От физического лица юридическому лицу">От физического лица юридическому лицу</option>
                                                        <option value="От юридического лица физическому лицу">От юридического лица физическому лицу</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="dogovor__row single" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Описание отправления', 'icdek') ?></div>
                                                    <textarea name="desc" class="field__textarea" placeholder="<?php echo __('Какие документы необходимо доставить.', 'icdek') ?>" data-required></textarea>
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Количество', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="qty">
                                                </div>

                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Вес, кг', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="weight">
                                                </div>
                                            </div>

                                            <div class="dogovor__row" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Габариты, ДхШхВ в см', 'icdek') ?></div>
                                                    <input type="text" class="field__input" data-required name="sizes">
                                                </div>
                                            </div>

                                            <div class="dogovor__row single" v-if="isDocument">
                                                <div class="field">
                                                    <div class="field__label"><?php echo __('Комментарий', 'icdek') ?></div>
                                                    <textarea name="comment" class="field__textarea" placeholder="<?php echo __('Опишите особенности вашего отправления. Или укажите направление, куда вам необходимо отправить документы, если оно не представлено выше.', 'icdek') ?>" data-required></textarea>
                                                </div>
                                            </div>

                                            <div class="dogovor__row">
                                                <div class="field">
                                                    <div class="field__label">Добавить вложения</div>
                                                    <label class="field__file">
                                                        <input type="file" name="file">
                                                        <div class="field__file-label">Прикрепить инвойс</div>
                                                        <div class="field__file-name"></div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form__privacy">
                                                <label class="field field--checkbox">
                                                    <input type="checkbox" class="agreement">
                                                    <span class="field__checkbox"></span>
                                                    <span class="field__label"><?php echo __('Даю свое', 'icdek') ?> <a href="<?php echo home_url('/agreement/') ?>" target="_blank"><?php echo __('согласие на обработку персональный данных', 'icdek') ?></a> <?php echo __('в соответствии с', 'icdek') ?> <a href="<?php echo get_privacy_policy_url() ?>" target="_blank"><?php echo __('Политикой конфиденциальности', 'icdek') ?></a></span>
                                                </label>
                                            </div>
                                            <div class="dogovor__button">
                                                <button class="button button--fill button--green" @click="submit"><?php echo __('Отправить анкету', 'icdek') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>