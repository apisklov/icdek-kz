<?php get_template_part('template-parts/element/popup') ?>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__company">
                <div class="footer__logo"><?php get_svg('/images/logo.svg') ?></div>
                <div class="footer__cdek"><a href="https://cdek.ru" target="_blank"><?php esc_html_e('Официальный сайт СДЭК', 'icdek') ?></a></div>
                <div class="footer__privacy">
                    <a href="<?php echo get_privacy_policy_url() ?>"><?php echo __('Политика конфиденциальности', 'icdek') ?></a>
                </div>
            </div>
            <div class="footer__column">
                <div class="footer__title"><?php esc_html_e('Договор', 'icdek') ?></div>
                <div class="footer__nav">
                    <?php if (has_nav_menu('footer-dogovor')) : ?>
                        <nav class="nav">
                            <?php wp_nav_menu(
                                [
                                    'theme_location' => 'footer-dogovor',
                                    'container' => false,
                                    'container_class' => '',
                                    'menu_class' => 'nav__list',
                                    'item_class' => 'nav__item',
                                    'link_class' => 'nav__link',
                                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                ]
                            ); ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer__column">
                <div class="footer__title"><?php esc_html_e('Услуги', 'icdek') ?></div>
                <div class="footer__nav">
                    <?php if (has_nav_menu('footer-services')) : ?>
                        <nav class="nav">
                            <?php wp_nav_menu(
                                [
                                    'theme_location' => 'footer-services',
                                    'container' => false,
                                    'container_class' => '',
                                    'menu_class' => 'nav__list',
                                    'item_class' => 'nav__item',
                                    'link_class' => 'nav__link',
                                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                ]
                            ); ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer__column">
                <div class="footer__title"><?php esc_html_e('Сервисы', 'icdek') ?></div>
                <div class="footer__nav">
                    <?php if (has_nav_menu('footer-action')) : ?>
                        <nav class="nav">
                            <?php wp_nav_menu(
                                [
                                    'theme_location' => 'footer-action',
                                    'container' => false,
                                    'container_class' => '',
                                    'menu_class' => 'nav__list',
                                    'item_class' => 'nav__item',
                                    'link_class' => 'nav__link',
                                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                                ]
                            ); ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer__contacts">
                <?php if (! is_forward()) : ?>
                    <div class="footer__callback">
                        <div class="footer__messengers">
                            <?php do_action('element/messengers') ?>
                        </div>
                        <div class="footer__telephone">
                            <a href="tel:<?php echo get_setting('phone') ?>" class="footer__phone"><?php echo get_setting('phone') ?></a>
                            <div class="footer__telephone-info"><?php echo __('для юр. лиц, ИП и самозанятых', 'icdek') ?></div>
                        </div>
                    </div>
                    <div class="footer__address"><?php echo get_setting('address') ?></div>
                    <a href="mailto:<?php echo get_setting('email') ?>" class="footer__email"><?php echo get_setting('email') ?></a>
                <?php endif; ?>
                <div class="footer__button">
                    <?php do_action('element/button', [
                        'text' => esc_html('Заключить договор', 'icdek'),
                        'action' => 'link',
                        'link' => apply_filters('dogovor_link', home_url('/dogovor/')),
                        'classes' => 'button--small'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>

</html>