<?php

add_action('element/button', 'output_element_button');
add_action('element/messengers', 'output_element_messengers');
add_action('element/lang', 'output_element_lang');

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

function output_element_lang()
{
    global $post;
    $post_id = $post->ID;

    $args = [
        'active' => 'ru',
        'link' => '',
        'list' => []
    ];

    if (function_exists('pll_current_language')) {
        $current = pll_current_language();

        if( $current == 'kk' ) {
            $args['active'] = 'ru';
        } else {
            $args['active'] = 'kk';
        }

        $translated_id = pll_get_post($post_id, $args['active']);
        $args['link'] = get_the_permalink( $translated_id );
    }

    if (function_exists('pll_languages_list')) {
        $args['list'] = pll_languages_list();
    }

    if( $post ) {
        $args['list'] = array_map(function ($locale) use ($post) {
            $post_id = $post->ID;
            $translated_id = pll_get_post($post_id, $locale);
            return [
                'locale' => $locale,
                'link' => get_the_permalink($translated_id)
            ];
        }, pll_languages_list());
    }

    get_template_part('template-parts/element/lang', null, $args);
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
    $default = [
        'form' => 'dogovor'
    ];

    $args = wp_parse_args( $args, $default );

    if (is_page(['b2b-delivery', 'dostavka-kommercheskih-gruzov'])) {
        $args['form'] = 'b2b';
    }

    wp_enqueue_script($args['form']);
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
    $default = [
        'classes' => 'guide--counter'
    ];

    $args = wp_parse_args($args, $default);

    if (is_page(['b2b-delivery', 'dostavka-kommercheskih-gruzov'])) {
        $args['classes'] = 'guide--list';
    }

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

    if (is_page(['b2b-delivery', 'dostavka-kommercheskih-gruzov'])) {
        $args['button'] = [
            'action' => 'scroll',
            'text' => __( 'Оставить заявку', 'icdek' ),
            'scroll' => '#dogovor'
        ];
    }


    if (is_page('express-dostavka')) {
        $args['button'] = [
            'action' => 'scroll',
            'text' => __( 'Рассчитать стоимость', 'icdek' ),
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

    if ($args['view'] == 'b2b') {
        $args['sections'] = [];

        $args['sections'][] = [
            'title' => __( 'Грузы', 'icdek' ),
            'list' =>  array_splice($args['list'], 0, 8)
        ];

        $args['sections'][] = [
            'title' => __( 'Документы', 'icdek' ),
            'list' =>  array_splice($args['list'], 0, 20)
        ];
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
