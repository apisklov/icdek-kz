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
                                <div class="compare__col"><?php echo __('Без договора', 'icdek') ?></div>
                                <div class="compare__col light"><?php echo __('С договором', 'icdek') ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Тариф «Посылка» от 950 ₸ за 3 кг', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Наложенный платёж', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Бесплатная частичная доставка', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Бесплатный осмотр вложения', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Бесплатная примерка', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Бесплатная упаковка', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Постоплата за услуги', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Интеграция с базой СДЭК по API-протоколу', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Бесплатное хранение 14 дней', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Закрепленный менеджер', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_no.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Отслеживание заказа', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Страхование', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('Личный кабинет', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row">
                                <div class="compare__col"><?php echo __('СМС-оповещение', 'icdek') ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                                <div class="compare__col"><?php get_svg( '/icons/compare_yes.svg' ) ?></div>
                            </div>
                            <div class="compare__row bottom">
                                <div class="compare__col"></div>
                                <div class="compare__col"></div>
                                <div class="compare__col">
                                    <div class="compare__border"></div>
                                    <a href="#" data-scroll-to="#dogovor" class="button button--green button--fill"><?php echo __('Заключить договор', 'icdek') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="compare__button">
                        <a href="#" data-scroll-to="#dogovor" class="button button--green button--fill"><?php echo __('Заключить договор', 'icdek') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>