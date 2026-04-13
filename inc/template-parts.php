<?php

add_action('element/button', 'output_element_button');
add_action('element/messengers', 'output_element_messengers');

add_action('section/intro', 'output_section_intro');
add_action('section/features', 'output_section_features');
add_action('section/compare', 'output_section_compare');
add_action('section/promo', 'output_section_promo');
add_action('section/calc', 'output_section_calc');
add_action('section/about', 'output_section_about');
add_action('section/dogovor', 'output_section_dogovor');
add_action('section/faq', 'output_section_faq');
add_action('section/marketplace', 'output_section_marketplace');
add_action('section/guide', 'output_section_guide');
add_action('section/marketplace_scheme', 'output_section_marketplace_scheme');
add_action('section/prices', 'output_section_prices');
add_action('section/steps', 'output_section_steps');
add_action('section/countries', 'output_section_countries');
add_action('section/forward', 'output_section_forward');
add_action('section/content', 'output_section_content');
add_action('section/dashboard', 'output_section_dashboard');

add_action('account/sidebar', 'output_account_sidebar');
add_action('account/content', 'output_account_content');
add_action('account/leads', 'output_account_leads');
add_action('account/lead_info', 'output_account_lead_info');
add_action('account/stats', 'output_account_stats');
add_action('account/settings', 'output_account_settings');

function output_element_button($args = [])
{
    $default = [
        'style' => 'fill',
        'classes' => ''
    ];
    $args = wp_parse_args($args, $default);

    if (is_forward() && $args['action'] == 'link') {
        $args['link'] = get_setting('forward_link');
    }

    get_template_part('template-parts/element/button', null, $args);
}

function output_element_messengers($args = [])
{
    get_template_part('template-parts/element/messengers', null, $args);
}

function output_section_intro($args = [])
{
    $default = [
        'label' => (is_forward()) ? 'CDEK FORWARD' : '',
        'style' => 'block',
        'heading' => (strlen($args['title']) > 100) ? 2 : 1
    ];
    $args = wp_parse_args($args, $default);

    if (empty($args['image'])) {
        $args['style'] = 'simple';
    }

    get_template_part('template-parts/section/intro', null, $args);
}

function output_section_features($args = [])
{
    $default = [
        'class' => ''
    ];

    $classes = [
        '1' => 'single',
        '2' => 'double',
        '3' => 'triple',
        '4' => 'four'
    ];

    $default['class'] = isset($classes[count($args['list'])]) ? $classes[count($args['list'])] : '';

    $args = wp_parse_args($args, $default);
    get_template_part('template-parts/section/features', null, $args);
}

function output_section_compare($args = [])
{
    get_template_part('template-parts/section/compare', null, $args);
}

function output_section_promo($args = [])
{
    get_template_part('template-parts/section/promo', null, $args);
}

function output_section_calc($args = [])
{
    wp_enqueue_script('calc');
    get_template_part('template-parts/section/calc', null, $args);
}

function output_section_about($args = [])
{
    get_template_part('template-parts/section/about', null, $args);
}

function output_section_dogovor($args = [])
{
    wp_enqueue_script('dogovor');
    get_template_part('template-parts/section/dogovor', null, $args);
}

function output_section_faq($args = [])
{
    get_template_part('template-parts/section/faq', null, $args);
}

function output_section_marketplace($args = [])
{
    $default = [
        'logos'
    ];

    $args = wp_parse_args($args, $default);

    if (is_forward()) {
        $logos = [
            'logo-6pm.png',
            'logo-1688.png',
            'logo-alibaba.png',
            'logo-amazon.png',
            'logo-asos.png',
            'logo-crocs.png',
            'logo-ebay.png',
            'logo-etsy.png',
            'logo-gap.png',
            'logo-hm.png',
            'logo-iherb.png',
            'logo-lego.png',
            'logo-levis.png',
            'logo-mango.png',
            'logo-massimo-dutti.png',
            'logo-newbalance.png',
            'logo-osho.png',
            'logo-tommy.png',
            'logo-vans.png',
            'logo-victoria-secret.png',
            'logo-walmart.png',
            'logo-wish.png',
            'logo-zara.png',
            'logo-nike.png'
        ];

        $args['logos'] = array_map(function ($filename) {
            return get_template_directory_uri() . '/assets/images/shops/' . $filename;
        }, $logos);
    }
    get_template_part('template-parts/section/marketplace', null, $args);
}

function output_section_guide($args = [])
{
    get_template_part('template-parts/section/guide', null, $args);
}

function output_section_marketplace_scheme($args = [])
{
    $default = [
        'list' => [
            [
                'types' => ['FBO', 'FBW', 'FBY'],
                'title' => 'Торговля со склада маркетплейса',
                'text' => 'Примем ваш груз на своём фулфилмент складе, промаркируем, упакуем и доставим его до склада маркетплейса. Хранение и отправка товара до конечного покупателя при такой схеме лежит на маркетплейсе.',
                'services' => ['Маркировка', 'Упаковка', 'Доставка до маркетплейса'],
                'shops' => ['WB', 'Ozon', 'Мегамаркет']
            ],
            [
                'types' => ['FBS', 'rFBS'],
                'title' => 'Торговля со склада СДЭК Фулфилмент',
                'text' => 'Организуем хранение и маркировку ваших товаров на нашем складе фулфилмента СДЭК. Доставку заказов до конечного покупателя при такой схеме осуществляет маркетплейс.',
                'services' => ['Хранение', 'Маркировка', 'Упаковка'],
                'shops' => ['WB', 'Ozon', 'Яндекс Маркет', 'Мегамаркет']
            ],
            [
                'types' => ['DBS'],
                'title' => 'Хранение и доставка силами СДЭК',
                'text' => 'Возьмём на себя хранение вашего товара, его маркировку, а также доставку до конечного покупателя. Маркетплейс при такой схеме выступает только в роли витрины для товара.',
                'services' => ['Хранение', 'Маркировка', 'Упаковка', 'Доставка до покупателя'],
                'shops' => ['WB', 'Яндекс Маркет']
            ]
        ],
        'button' => [
            'action' => 'modal',
            'text' => 'Рассчитать доставку',
            'modal' => '#popup-marketplace'
        ]
    ];
    $args = wp_parse_args($args, $default);


    if (is_page('express-dostavka')) {
        $args['button'] = [
            'action' => 'scroll',
            'text' => 'Рассчитать стоимость',
            'scroll' => '.section--calc'
        ];
    }
    get_template_part('template-parts/section/marketplace-scheme', null, $args);
}

function output_section_prices($args = [])
{
    get_template_part('template-parts/section/prices', null, $args);
}

function output_section_steps($args = [])
{
    get_template_part('template-parts/section/steps', null, $args);
}

function output_section_countries($args = [])
{
    if ($args['view'] == 'carousel') {
        $length_part = ceil(count($args['list']) / 2);
        $args['list'] = array_chunk($args['list'], $length_part);
    }
    get_template_part('template-parts/section/countries', null, $args);
}

function output_section_forward($args = [])
{
    $default = [
        'shops' => [
            'logo-zara.png',
            'logo-hm.png',
            'logo-1688.png',
            'logo-alibaba.png',
            'logo-newbalance.png',
            'logo-ebay.png',
            'logo-gap.png',
            'logo-asos.png',
            'logo-mango.png',
            'logo-osho.png'
        ]
    ];

    $args = wp_parse_args($args, $default);
    get_template_part('template-parts/section/forward', null, $args);
}

function output_section_content()
{
    get_template_part('template-parts/section/content');
}

function output_account_sidebar()
{
    $args = [
        'list' => []
    ];

    $args['list'] = [
        [
            'icon' => 'account',
            'link' => 'account/',
            'label' => 'Личный кабинет'
        ],
        [
            'icon' => 'lightning',
            'link' => 'account/partner/',
            'label' => 'Партнерский раздел'
        ],
        [
            'icon' => 'stats',
            'link' => 'account/stats/',
            'label' => 'Статистика'
        ],
        [
            'icon' => 'leads',
            'link' => 'account/leads/',
            'label' => 'Клиенты'
        ],
        [
            'icon' => 'personal',
            'link' => 'account/settings/',
            'label' => 'Личные данные'
        ],
        [
            'icon' => 'logout',
            'link' => 'account/logout/',
            'label' => 'Выйти из кабинета'
        ]
    ];

    if (current_user_can('cdek_admin')) {
        unset($args['list'][1]);
    }

    if (current_user_can('cdek_partner')) {
        unset($args['list'][2]);
    }

    get_template_part('template-parts/account/sidebar', null, $args);
}

function output_account_content()
{
    $account_section = get_query_var('account_section');
    $lead_id = get_query_var('lead_id');

    if (empty($account_section)) {
        get_template_part('template-parts/account/panel');
    } else if ($account_section == 'partner') {
        get_template_part('template-parts/account/partner');
    } else if ($account_section == 'settings') {
        do_action('account/settings');
    } else if ($account_section == 'stats') {
        do_action('account/stats');
    } else if ($account_section == 'leads') {
        if (! empty($lead_id)) {
            do_action('account/lead_info');
        } else {
            do_action('account/leads');
        }
    }
}

function output_account_leads()
{
    $args = [
        'leads' => []
    ];

    $user_id = get_current_user_id();
    $query_args = [
        'post_type' => 'lead',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'fields' => 'ids'
    ];

    if (current_user_can('cdek_partner')) {
        $query_args['meta_query'] = [
            [
                'key' => 'lead_partner',
                'value' => $user_id,
                'compare' => '='
            ]
        ];
    }

    $query = new WP_Query($query_args);

    $args['leads'] = $query->posts;

    $args['leads'] = array_map(function ($lead_id) {
        $lead_data = get_field('lead', $lead_id);
        return [
            'id' => $lead_id,
            'name' => get_the_title($lead_id),
            'phone' => $lead_data['phone'],
            'email' => $lead_data['email'],
            'date' => get_the_date('d.m.Y', $lead_id),
            'partner' => $lead_data['partner']
        ];
    }, $args['leads']);

    get_template_part('template-parts/account/leads', null, $args);
}

function output_account_lead_info()
{
    $lead_id = get_query_var('lead_id');

    $args = [
        'name' => '',
        'date' => get_the_date('d.m.Y', $lead_id),
        'data' => get_field('lead', $lead_id),
        'error' => false
    ];

    $args['name'] = get_the_title($lead_id);

    if (! get_permission_lead()) {
        $args['error'] = 'У вас нет прав для просмотра данного клиента.';
    }

    get_template_part('template-parts/account/lead_info', null, $args);
}

function output_account_stats()
{

    if (!current_user_can('cdek_admin') && ! current_user_can('administrator')) {
        return;
    }

    $args = [
        'partners' => [],
        'leads' => 0,
        'prev_month_leads' => 0,
        'current_month_leads' => 0
    ];

    $query_args = [
        'post_type' => 'lead',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
        'meta_query' => [
            [
                'key' => 'lead_partner',
                'value' => '',
                'compare' => '!='
            ]
        ]
    ];

    $partners = get_users([
        'role' => 'cdek_partner',
        'orderby' => 'registered',
        'order' => 'DESC'
    ]);

    $partners = array_map(function ($partner) use ($query_args) {
        $args = wp_parse_args(
            ['meta_query' => [
                [
                    'key' => 'lead_partner',
                    'value' => $partner->ID,
                    'compare' => '='
                ]
            ]],
            $query_args
        );

        $leads = new WP_Query($args);

        return [
            'id' => $partner->ID,
            'name' => $partner->first_name,
            'date' => date('d.m.Y', strtotime($partner->user_registered)),
            'leads' => count($leads->posts)
        ];
    }, $partners);

    $args['partners'] = $partners;

    $leads = new WP_Query($query_args);
    $args['leads'] = count($leads->posts);

    // Клиентов за предыдущий месяц
    $prev_month_leads = new WP_Query(
        wp_parse_args(
            [
                'date_query' => [
                    [
                        'after' => 'first day of last month',
                        'before' => 'last day of last month',
                        'inclusive' => true
                    ]
                ]
            ],
            $query_args
        )
    );
    $args['prev_month_leads'] = count($prev_month_leads->posts);

    // Клиентов за текущий месяц
    $current_month_leads = new WP_Query(
        wp_parse_args(
            [
                'date_query' => [
                    [
                        'after' => 'first day of this month',
                        'before' => 'last day of this month',
                        'inclusive' => true
                    ]
                ]
            ],
            $query_args
        )
    );
    $args['current_month_leads'] = count($current_month_leads->posts);

    get_template_part('template-parts/account/stats', null, $args);
}

function output_account_settings()
{
    $user = wp_get_current_user();

    $args = [];

    if (is_user_logged_in()) {
        $args = [
            'name' => $user->first_name,
            'email' => $user->user_email,
            'login' => $user->user_login,
            'city' => get_user_meta($user->ID, 'city', true)
        ];
    }

    get_template_part('template-parts/account/settings', null, $args);
}

function output_section_dashboard()
{
    $args = [
        'list' => []
    ];

    $partners = get_users([
        'role' => 'cdek_partner',
        'orderby' => 'registered',
        'order' => 'DESC'
    ]);

    foreach ($partners as $partner) {
        $args['list'][] = [
            'user' => $partner,
            'stats' => get_partner_stats($partner->ID)
        ];
    }

    get_template_part('template-parts/section/dashboard', null, $args);
}
