<div class="mobile-menu">
    <div class="mobile-menu__wrapper">
        <div class="mobile-menu__header">
            <div class="mobile-menu__logo">
                <?php get_svg('/images/logo.svg') ?>
            </div>
            <div class="mobile-menu__close">
                <?php get_svg('/icons/close.svg') ?>
            </div>
        </div>
        <div class="mobile-menu__body">
            <div class="mobile-menu__nav">
                <?php if (has_nav_menu('header')) : ?>
                    <nav class="nav">
                        <?php wp_nav_menu(
                            [
                                'theme_location' => 'mobile',
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
        <div class="mobile-menu__footer">
            <?php if (! is_forward()) : ?>
                <?php do_action('element/button', [
                    'action' => 'link',
                    'link' => home_url( '/zaklyuchit-dogovor/' ),
                    'text' => 'Заключить договор'
                ]) ?>
            <?php else : ?>
                <?php do_action('element/button', [
                    'action' => 'link',
                    'link' => get_setting('link_forward'),
                    'text' => 'Зарегистрироваться'
                ]) ?>
            <?php endif; ?>
        </div>
    </div>
</div>