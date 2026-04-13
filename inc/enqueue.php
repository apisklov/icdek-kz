<?php

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

function enqueue_theme_scripts()
{

    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/assets/css/main.min.css',
        [],
        filemtime(get_theme_file_path('/assets/css/main.min.css'))
    );

    wp_enqueue_script(
        'script',
        get_template_directory_uri() . '/assets/js/app.min.js',
        [],
        filemtime(get_theme_file_path('/assets/js/app.min.js')),
        [
            'in_footer' => true
        ]
    );

    wp_register_script(
        'vue',
        get_template_directory_uri() . '/assets/js/libs/vue.global.min.js',
        [],
        null,
        [
            'in_footer' => true
        ]
    );

    wp_register_script(
        'calc',
        get_template_directory_uri() . '/assets/js/calc.min.js',
        [ 'vue' ],
        filemtime(get_theme_file_path('/assets/js/calc.min.js')),
        [
            'in_footer' => true
        ]
    );

    wp_register_script(
        'dogovor',
        get_template_directory_uri() . '/assets/js/dogovor.min.js',
        [ 'vue' ],
        filemtime(get_theme_file_path('/assets/js/dogovor.min.js')),
        [
            'in_footer' => true
        ]
    );

    wp_register_script(
        'tracking',
        get_template_directory_uri() . '/assets/js/tracking.min.js',
        [ 'vue' ],
        filemtime(get_theme_file_path('/assets/js/tracking.min.js')),
        [
            'in_footer' => true
        ]
    );

    wp_register_script(
        'account',
        get_template_directory_uri() . '/assets/js/account.min.js',
        null,
        filemtime(get_theme_file_path('/assets/js/account.min.js')),
        [
            'in_footer' => true
        ]
    );

    $partner_id = 0;

    if( current_user_can('cdek_partner') ) {
        $user_id = get_current_user_id();
        $partner_id = get_user_meta( $user_id, 'partner_id', true );
    }

    $script_data = [
        'qr_link' => rest_url( 'partner/v1/qr/' )
    ];

    if( $partner_id ) {
        $script_data['partner_id'] = $partner_id;
    }

    wp_add_inline_script(
        'account',
        'const ACCOUNT_DATA = ' . json_encode( $script_data ) . ';',
        'before'
    );
}
