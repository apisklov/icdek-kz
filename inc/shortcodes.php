<?php

add_shortcode('phone', 'output_shortcode_phone');
add_shortcode('whatsapp', 'output_shortcode_whatsapp');
add_shortcode('telegram', 'output_shortcode_telegram');

function output_shortcode_phone() {
    return get_setting('phone');
}

function output_shortcode_whatsapp() {
    return get_setting('whatsapp');
}

function output_shortcode_telegram() {
    return get_setting('telegram');
}