<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(88056793, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
        ym(95211048, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div>
            <img src="https://mc.yandex.ru/watch/88056793" style="position:absolute; left:-9999px;" alt="Счетчик Метрики" title="Метрика" />
            <img src="https://mc.yandex.ru/watch/95211048" style="position:absolute; left:-9999px;" alt="Счетчик Метрики" title="Метрика" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <?php get_template_part('template-parts/mobile-menu') ?>
    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="header__logo">
                    <?php if (is_front_page()) : ?>
                        <?php get_svg('/images/logo.svg') ?>
                    <?php else : ?>
                        <a href="<?php echo home_url() ?>"><?php get_svg('/images/logo.svg') ?></a>
                    <?php endif; ?>
                    <?php if (is_account_page()) : ?>
                        • Личный кабинет партнера
                    <?php endif; ?>
                </div>
                <?php if (! is_account_page()) : ?>
                    <div class="header__nav">
                        <?php if (has_nav_menu('header')) : ?>
                            <nav class="nav">
                                <?php wp_nav_menu(
                                    [
                                        'theme_location' => 'header',
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
                    <?php if (! is_forward()) : ?>
                        <div class="header__contacts">
                            <a href="tel:<?php echo get_setting('phone') ?>" class="header__phone"><?php echo get_setting('phone') ?></a>
                            <div class="header__messengers">
                                <?php do_action('element/messengers') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="header__button">
                        <?php if (is_forward()) : ?>
                            <?php do_action('element/button', [
                                'text' => esc_html('Зарегистрироваться', 'icdek'),
                                'action' => 'link',
                                'link' => get_setting('link_forward'),
                                'classes' => 'button--small'
                            ]) ?>
                        <?php elseif( is_page( 'promo' ) ) : ?>
                            <?php do_action('element/button', [
                                'text' => esc_html('Личный кабинет', 'icdek'),
                                'action' => 'link',
                                'link' => home_url('/account/'),
                                'classes' => 'button--small'
                            ]) ?>
                        <?php else : ?>
                            <?php do_action('element/button', [
                                'text' => esc_html('Заключить договор', 'icdek'),
                                'action' => 'link',
                                'link' => home_url('/zaklyuchit-dogovor/'),
                                'classes' => 'button--small'
                            ]) ?>
                        <?php endif; ?>
                    </div>
                    <?php if (! is_forward()) : ?>
                        <a href="tel:<?php echo get_setting('phone') ?>" class="header__call">
                            <?php get_svg('/icons/phone.svg') ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="header__burger">
                    <div class="burger">
                        <div class="burger__open"><?php get_svg('/icons/burger.svg') ?></div>
                        <div class="burger__close"><?php get_svg('/icons/close.svg') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </header>