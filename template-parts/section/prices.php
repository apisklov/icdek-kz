<section class="section section--prices">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo $args['title'] ?></h2>
            </div>
            <?php if ($args['subtitle']) : ?>
                <div class="section__desc">
                    <?php echo $args['subtitle'] ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="section__content">
            <div class="prices">
                <div class="prices__wrapper">
                    <?php if (! empty($args['list'])) : ?>
                        <div class="prices__list">
                            <?php foreach ($args['list'] as $item) : ?>
                                <div class="prices__item">
                                    <div class="prices__price"><?php echo esc_html($item['price']) ?></div>
                                    <div class="prices__text"><?php echo $item['text'] ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <?php if (is_page('dostavka-dokumentov')) : ?>
                            <div class="prices__doc">
                                <div class="prices__doc-image">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/cdek-document.png' ?>" alt="Конверты СДЭК" title="Отправка документов СДЭК">
                                </div>
                                <div class="prices__doc-items">
                                    <div class="prices__doc-item">
                                        <div class="prices__doc-label">Максимальный вес:</div>
                                        <div class="prices__doc-text">1 кг</div>
                                    </div>
                                    <div class="prices__doc-item">
                                        <div class="prices__doc-label">Упаковка:</div>
                                        <div class="prices__doc-text">фирменный конверт</div>
                                    </div>
                                    <div class="prices__doc-item">
                                        <div class="prices__doc-label">Страхование:</div>
                                        <div class="prices__doc-text">добровольное на усмотрение отправителя</div>
                                    </div>
                                    <div class="prices__doc-item">
                                        <div class="prices__doc-label">Габариты конверта:</div>
                                        <div class="prices__doc-text">34×27×2 см</div>
                                    </div>
                                    <div class="prices__doc-item">
                                        <div class="prices__doc-label">Срок доставки:</div>
                                        <div class="prices__doc-text">от 1 дня</div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="prices__table">
                                <div class="prices__cargo">
                                    <div class="prices__box">
                                        <img src="<?php echo get_template_directory_uri() . '/assets/images/cargo_box.png' ?>" alt="Груз" title="Коробка 60х40х40">
                                    </div>
                                    <div class="prices__info">
                                        <div class="prices__info-item">
                                            <div class="prices__label">Откуда:</div>
                                            <div class="prices__value">Склад фулфилмента СДЭК</div>
                                        </div>
                                        <div class="prices__info-item">
                                            <div class="prices__label">Куда:</div>
                                            <div class="prices__value">Склад маркетплейса</div>
                                        </div>
                                        <div class="prices__info-item">
                                            <div class="prices__label">Груз:</div>
                                            <div class="prices__value">Коробка 60×40×40 см</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prices__cities">
                                    <div class="prices__city">
                                        <div class="prices__city-name">Москва и МО</div>
                                        <div class="prices__city-rate">650 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Нижний Новгород</div>
                                        <div class="prices__city-rate">920 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Казань</div>
                                        <div class="prices__city-rate">270 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Краснодар</div>
                                        <div class="prices__city-rate">600 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Новосибирск</div>
                                        <div class="prices__city-rate">800 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Санкт-Петербург</div>
                                        <div class="prices__city-rate">800 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Самара</div>
                                        <div class="prices__city-rate">200 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Ростов-на-Дону</div>
                                        <div class="prices__city-rate">850 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Екатеринбург</div>
                                        <div class="prices__city-rate">450 ₽</div>
                                    </div>
                                    <div class="prices__city">
                                        <div class="prices__city-name">Хабаровск</div>
                                        <div class="prices__city-rate">700 ₽</div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                    <div class="prices__action">
                        <?php if (! empty($args['text'])) : ?>
                            <div class="prices__action-text"><?php echo $args['text'] ?></div>
                            <div class="prices__action-manager">
                                <div class="manager manager--hero">
                                    <div class="manager__photo"><img src="<?php echo get_template_directory_uri() . '/assets/images/manager_1.png' ?>" alt="Фото менеджера СДЭК" title="Менеджер СДЭК"></div>
                                    <div class="manager__name">Юлия</div>
                                    <div class="manager__desc">Менеджер i-cdek.ru</div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="prices__action-button">
                            <?php do_action('element/button', $args['button']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>