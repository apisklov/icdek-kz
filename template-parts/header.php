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

        ym(100407972, "init", {
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
            <img src="https://mc.yandex.ru/watch/100407972" style="position:absolute; left:-9999px;" alt="Счетчик Метрики" title="Метрика" />
            <img src="https://mc.yandex.ru/watch/95211048" style="position:absolute; left:-9999px;" alt="Счетчик Метрики" title="Метрика" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <?php get_template_part('template-parts/mobile-menu') ?>
    <header class="header">
        <div class="container">
            <div class="header__wrapper">
                <div class="header__logo">
                    <div class="header__logo-wrap">
                        <?php if (is_front_page()) : ?>
                            <?php get_svg('/images/logo.svg') ?>
                        <?php else : ?>
                            <a href="<?php echo home_url() ?>"><?php get_svg('/images/logo.svg') ?></a>
                        <?php endif; ?>
                        <div class="header__logo-label"><?php echo __( 'для бизнеса', 'icdek' ) ?></div>
                    </div>
                    <div class="header__lang">
                        <?php do_action('element/lang') ?>
                    </div>
                </div>
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
                </div>
                <div class="header__contacts">
                    <div class="header__telephone">
                        <a href="tel:<?php echo get_setting('phone') ?>" class="header__phone"><?php echo get_setting('phone') ?></a>
                        <div class="header__telephone-info"><?php echo __('для юр. лиц, ИП и самозанятых', 'icdek') ?></div>
                    </div>
                    <div class="header__messengers">
                        <?php do_action('element/messengers') ?>
                    </div>
                </div>
                <div class="header__button">
                    <?php do_action('element/button', [
                            'text' => esc_html('Заключить договор', 'icdek'),
                            'action' => 'link',
                            'link' => apply_filters('dogovor_link', home_url('/zaklyuchit-dogovor/')),
                            'classes' => 'button--small'
                        ]) ?>
                </div>
                <a href="tel:<?php echo get_setting('phone') ?>" class="header__call">
                    <?php get_svg('/icons/phone.svg') ?>
                </a>
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