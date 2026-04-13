<?php

add_filter('nav_menu_item_id', '__return_empty_string');
add_filter('nav_menu_css_class', 'nav_menu_class_item', 10, 3);
add_filter('nav_menu_link_attributes', 'nav_menu_attr_link', 10, 4);
add_filter('nav_menu_submenu_css_class', 'nav_menu_submenu_css_class', 10, 3);
add_filter( 'body_class', 'add_body_classes', 10, 2 );
add_filter( 'wp_get_attachment_image_attributes', 'set_add_attr_for_attachment_image', 10, 3 );

function nav_menu_class_item($classes, $item, $args)
{

    if (in_array('menu-item-has-children', $classes)) {
        $classes[] = 'is-dropdown';
    }

    $classes = array_filter($classes, function ($class) {
        return ! preg_match('/menu-item/', $class) && ! preg_match('/page/', $class);
    });

    if (isset($args->item_class)) {
        $classes[] = $args->item_class;
    }
    return $classes;
}

function nav_menu_attr_link($atts, $item, $args, $depth)
{
    if (isset($args->link_class)) {
        $atts['class'] = $args->link_class;
    }

    return $atts;
}

function nav_menu_submenu_css_class($classes, $args, $depth)
{
    $classes = ['nav__submenu'];
    return $classes;
}

function add_body_classes( $classes, $class ) {
    global $post;

    $classes = [];

    if( is_forward() ) {
        $classes[] = 'page-forward';
    }

    $classes[] = 'page-' . $post->post_name;

    return $classes;
}

add_action( 'phpmailer_init', 'set_envelope_from_wp_mail' );

/**
 * Установка Sender для всех писем через wp_mail
 *
 * ⚡ action - phpmailer_init
 * @param  PHPMailer $phpmailer
 * @return void
 */
function set_envelope_from_wp_mail( $phpmailer ) {
	$phpmailer->Sender = 'info@i-cdek.ru';
}

/**
 * Добавляет дополнительные атрибуты для картинок
 *
 * @param  mixed $attr
 * @param  mixed $post
 * @param  mixed $size
 * @return void
 */
function set_add_attr_for_attachment_image( $attr, $post, $size ) {
    $title = get_the_title( $post );

    if( $title ) {
        $attr['title'] = $title;
    }

    return $attr;
}