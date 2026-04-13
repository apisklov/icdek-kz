<section class="section section--compare">
    <div class="container">
        <div class="section__wrapper">
            <div class="section__title">
                <h2 class="heading heading--level-2"><?php echo esc_html( $args['title'] ) ?></h2>
            </div>
            <?php if ($args['subtitle']) : ?>
                <div class="section__desc">
                    <?php echo $args['subtitle'] ?>
                </div>
            <?php endif; ?>
            <div class="section__content">
                <div class="compare">
                    <div class="compare__wrapper">
                        <div class="compare__table">
                            <div class="compare__row head">
                                <div class="compare__col"></div>
                                <div class="compare__col">Без договора</div>
                                <div class="compare__col light">С договором</div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Тариф «Посылка» от 125 руб за 3 кг</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Наложенный платёж</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Бесплатная частичная доставка</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Бесплатный осмотр вложения</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Бесплатная примерка</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Бесплатная упаковка</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Постоплата за услуги</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Интеграция с базой СДЭК по API-протоколу</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Бесплатное хранение 14 дней</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Закрепленный менеджер</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Отслеживание заказа</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Страхование</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">Личный кабинет</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col">СМС-оповещение</div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row bottom">
                                <div class="compare__col"></div>
                                <div class="compare__col"></div>
                                <div class="compare__col">
                                    <div class="compare__border"></div>
                                    <a href="#" data-scroll-to="#dogovor" class="button button--green button--fill">Заключить договор</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="compare__button">
                        <a href="#" data-scroll-to="#dogovor" class="button button--green button--fill">Заключить договор</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>