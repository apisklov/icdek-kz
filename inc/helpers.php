<?php

/**
 * Функция отладки и записи логов в файл.
 *
 * @param  mixed $data
 * @return void
 */
function dd($data)
{
    if (wp_get_environment_type() != 'production') {
        error_log(print_r($data, 1));
    }
}

/**
 * Подключает svg картинку в код.
 *
 * @param  mixed $path
 * @return void
 */
function get_svg($path)
{
    include get_parent_theme_file_path('assets' . $path);
}

/**
 * Выводит структуру страницы ACF layout
 *
 * @return void
 */
function layout_page()
{
    if (have_rows('layout')) {
        while (have_rows('layout')) {
            the_row();
            do_action('section/' . get_row_layout(), get_sub_field(get_row_layout()));
        }
    } else {
        do_action('section/intro', ['title' => get_the_title()]);
        do_action('section/content');
    }
}

/**
 * Получает настройки шаблона
 *
 * @param  mixed $name
 * @return void
 */
function get_setting($name = '')
{
    if (! $name) {
        return null;
    }

    $setting = get_field($name, 'option');

    if ($setting) {
        return apply_filters('setting/' . $name,  $setting);
    }

    return null;
}

/**
 * Получает ID города в системе СДЭК
 *
 * @param  mixed $data
 * @return void
 */
function get_cdek_city_id($data)
{

    if (! isset($data) || ! is_array($data)) {
        return false;
    }

    $token = get_access_cdek()['access_token'];

    $url = 'https://api.cdek.ru/v2/location/cities';

    $body = [
        'country_codes' => [$data['country_iso_code']],
        'city' => $data['city']
    ];

    if ($data['country_iso_code'] == 'RU') {
        $body['fias_guid'] = $data['city_fias_id'];
    }

    $response = wp_remote_get(
        $url . '?' . http_build_query($body),
        [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]
        ]
    );

    if (! is_wp_error($response)) {
        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (isset($body['errors'])) {
            return new WP_Error($body['errors'][0]['code'], $body['errors'][0]['message']);
        }

        return $body[0]['code'];
    } else {
        return $response;
    }
}

/**
 * Получает данные для подключения к API СДЭК
 *
 * @return void
 */
function get_access_cdek()
{
    $login = 'mZRNtij21PvwEuSR5tVL83NyYDQEXsfb';
    $password = 'rmCOXJEuLms6KFNJKwellw376I1UpL2k';

    $data = array(
        'grant_type' => 'client_credentials',
        'client_id' => $login,
        'client_secret' => $password
    );

    $response = wp_remote_post('https://api.cdek.ru/v2/oauth/token?' . http_build_query($data));

    if (! is_wp_error($response)) {
        $body = wp_remote_retrieve_body($response);

        if ($body) {
            $body = json_decode($body, true);
        }
        return $body;
    }

    return false;
}

function get_url_crm($path = 'form/')
{
    $url = '';

    if (wp_get_environment_type() == 'production') {
        $main = 'https://h.cpdg.ru/';
    } else {
        $main = 'http://handlers.local/';
    }

    $url = $main . 'site/i-cdek/' . $path;

    return $url;
}

function get_email_manager()
{
    return explode('|', get_setting('to_email'));
}

/**
 * Оптравляет данные на внешний сервер методом POST
 *
 * @param  mixed $url
 * @param  mixed $data
 * @return void
 */
function send_data($url, $data)
{
    $response = wp_remote_post($url, [
        'headers' => [
            'Content-Type' => 'application/json; charset=utf-8'
        ],
        'body' => json_encode($data),
        'method' => 'POST',
        'data_format' => 'body',
        'timeout' => 15
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error($response->get_error_message());
    } else {
        return json_decode(wp_remote_retrieve_body($response), true);
    }
}

/**
 * Возвращает заголовки для писем
 *
 * @return void
 */
function get_headers_mail()
{
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: СДЭК <no-reply@i-cdek.ru>\r\n";
    $headers .= "Reply-To: no-reply@i-cdek.ru\r\n";

    return $headers;
}

function get_shop_html_class($name = '')
{
    if (! $name) {
        return '';
    }

    $name = mb_strtoupper($name);

    switch ($name) {
        case 'WB':
            return 'wb';
        case 'WILDBERRIES':
            return 'wb';
        case 'OZON':
            return 'ozon';
        case 'ЯНДЕКС МАРКЕТ':
            return 'ym';
        case 'МЕГАМАРКЕТ':
            return 'mg';
        case 'KASPI':
            return 'kaspi';
        case 'FLIP':
            return 'flip';
    }
}

/**
 * Проверяет находимя ли мы на странице Forward
 *
 * @return void
 */
function is_forward()
{
    return is_page('forward') || is_single();
}

/**
 * Добавляет новый лид в админку
 *
 * @param  mixed $data
 * @return void
 */
function add_lead($data = [])
{
    if (empty($data)) {
        return;
    }

    $post_data = [
        'post_type' => 'lead',
        'post_status' => 'publish',
    ];

    $person_value = '';

    $meta_data = [];

    if (! empty($data['partner_id'])) {
        $find_partner = get_users([
            'role' => 'cdek_partner',
            'meta_key' => 'partner_id',
            'meta_value' => $data['partner_id'],
            'number' => 1,
            'count_total' => false,
        ]);

        if (! empty($find_partner)) {
            $post_data['post_author'] = $find_partner[0]->ID;
            $meta_data['partner'] = $find_partner[0]->ID;
        }
    }

    if (! empty($data['person'])) {
        if ($data['person'] == 'Индивидуальный предприниматель') {
            $post_data['post_title'] = sanitize_text_field('ИП ' . $data['name']);
        } else {
            $post_data['post_title'] = sanitize_text_field($data['name']);
        }

        switch ($data['person']) {
            case 'Юридическое лицо':
                $person_value = 'legal';
                break;
            case 'Индивидуальный предприниматель':
                $person_value = 'business';
                break;
            case 'Самозанятый гражданин':
                $person_value = 'self';
                break;
            default:
                $person_value = 'legal';
                break;
        }
    }

    $meta_data['person'] = $person_value;

    if (! empty($data['name'])) {
        $meta_data['name'] = $data['name'];
    }

    if (! empty($data['date_birth'])) {
        $meta_data['date_birth'] = $data['date_birth'];
    }

    if (! empty($data['passport_number'])) {
        $meta_data['passport_number'] = $data['passport_number'];
    }

    if (! empty($data['passport_date'])) {
        $meta_data['passport_date'] = $data['passport_date'];
    }

    if (! empty($data['passport_point'])) {
        $meta_data['passport_point'] = $data['passport_point'];
    }

    if (! empty($data['passport_address'])) {
        $meta_data['passport_address'] = $data['passport_address'];
    }

    if (! empty($data['inn'])) {
        $meta_data['inn'] = $data['inn'];
    }

    if (! empty($data['address_legal'])) {
        $meta_data['address_legal'] = $data['address_legal'];
    }

    if (! empty($data['address_fact'])) {
        $meta_data['address_fact'] = $data['address_fact'];
    }

    if (! empty($data['number_license'])) {
        $meta_data['number_license'] = $data['number_license'];
    }

    if (! empty($data['date_license'])) {
        $meta_data['date_license'] = $data['date_license'];
    }

    if (! empty($data['bik'])) {
        $meta_data['bik'] = $data['bik'];
    }

    if (! empty($data['payment'])) {
        $meta_data['payment'] = $data['payment'];
    }

    if (! empty($data['fio_anketa'])) {
        $meta_data['fio_anketa'] = $data['fio_anketa'];
    }

    if (! empty($data['fio_director'])) {
        $meta_data['fio_director'] = $data['fio_director'];
    }

    if (! empty($data['base_director'])) {
        $meta_data['base_director'] = $data['base_director'];
    }

    if (! empty($data['phone'])) {
        $meta_data['phone'] = $data['phone'];
    }

    if (! empty($data['email'])) {
        $meta_data['email'] = $data['email'];
    }

    if (! empty($data['link'])) {
        $meta_data['link'] = $data['link'];
    }

    if (! empty($data['comments'])) {
        $meta_data['comments'] = $data['comments'];
    }

    if (! empty($data['point_city'])) {
        $meta_data['point_city'] = $data['point_city'];
    }

    if (! empty($data['point_address'])) {
        $meta_data['point_address'] = $data['point_address'];
    }

    $post_id = wp_insert_post($post_data, true);

    if (! is_wp_error($post_id)) {
        update_field('lead', $meta_data, $post_id);
        return $post_id;
    }

    return false;
}

/**
 * Выводит отформатированную сумму с валютой
 *
 * @param  mixed $price
 * @param  mixed $currency
 * @return void
 */
function format_price($price = 0, $currency = '₽')
{
    if (is_numeric($price)) {
        return number_format_i18n($price) . ' ' . $currency;
    }

    return false;
}

/**
 * Возвращает значение utm
 *
 * @param  mixed $utm
 * @return void
 */
function get_utm($utm = '')
{

    if (!$utm) {
        return null;
    }

    // Берем из куки
    if (isset($_COOKIE[$utm]) && !empty($_COOKIE[$utm])) {
        return sanitize_text_field($_COOKIE[$utm]);
    }

    // Потом берем из GET
    if (isset($_GET[$utm]) && !empty($_GET[$utm])) {
        return sanitize_text_field($_GET[$utm]);
    }

    return null;
}

/**
 * Возвращает название языка по коду
 *
 * @param  mixed $code
 * @return void
 */
function get_lang_name_by_code($code)
{
    $lang = [
        'ru' => 'Русский',
        'kk' => 'Қазақ тілі'
    ];

    if (isset($lang[$code])) {
        return $lang[$code];
    }

    return '';
}
