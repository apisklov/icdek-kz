<?php

add_action('after_setup_theme', 'add_supports');

function add_supports()
{
    // Поддержка title
    add_theme_support('title-tag');

    // Поддержка thumbnails
    add_theme_support('post-thumbnails');

    register_nav_menu(
        'header',
        'Меню в шапке сайта'
    );

    register_nav_menu(
        'mobile',
        'Мобильное меню'
    );

    register_nav_menu(
        'footer-dogovor',
        'Договор в подвале'
    );

    register_nav_menu(
        'footer-services',
        'Услуги в подвале'
    );

    register_nav_menu(
        'footer-action',
        'Сервисы в подвале'
    );
}

add_action('wp_footer', 'output_cookie_notice');

function output_cookie_notice() {
	if( isset( $_COOKIE['cookieNotice'] ) ) {
		return;
	} ?>
	<div class="cookie-notice">
		<div class="cookie-notice__text">Пользуясь нашим сайтом, вы соглашаетесь с тем, что мы используем cookies.</div>
		<div class="cookie-notice__buttons">
			<a href="#" class="cookie-notice__confirm">Принять</a>
		</div>
	</div>
<?php }