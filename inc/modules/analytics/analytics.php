<?php

add_action('after_setup_theme', 'create_custom_messanger_leads_table');
add_action('init', 'add_rewrite_rule_go');
add_action('template_redirect', 'add_redirect_messenger');
add_action('admin_menu', 'add_menu_admin_analytics');
add_action('wp_ajax_load_metrika_chats', 'ajax_load_metrika_chats');

function create_custom_messanger_leads_table()
{
    global $wpdb;

    $table = 'messanger_leads';
    $version_table = 1;
    $option_name = $table . '_table_version';

    // Проверяем версию таблицы, если совпадает — ничего не делаем
    $current_version = get_option($option_name);
    if ($current_version == $version_table) {
        return;
    }

    $table_name = $wpdb->prefix . $table;
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        chat_id BIGINT(20) UNSIGNED NOT NULL,
        client_id VARCHAR(100) DEFAULT NULL,
        source VARCHAR(50) DEFAULT NULL,
        utm_campaign VARCHAR(255) DEFAULT NULL,
        utm_content VARCHAR(255) DEFAULT NULL,
        utm_medium VARCHAR(255) DEFAULT NULL,
        utm_source VARCHAR(255) DEFAULT NULL,
        utm_term VARCHAR(255) DEFAULT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY chat_id (chat_id),
        KEY client_id (client_id),
        KEY source (source)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Обновляем версию таблицы
    update_option($option_name, $version_table);
}

/**
 * Генерирует уникальное число для chat_id на основе client_id метрики
 *
 * @return int
 */
function generate_unique_chat_id()
{
    if (!isset($_COOKIE['_ym_uid'])) return null;

    $num = sprintf('%u', crc32($_COOKIE['_ym_uid']));
    return $num % 1000000000;
}

add_action('wp', 'setup_chat_id_cookie');

/**
 * Записывает chat_id в куки
 *
 * @return void
 */
function setup_chat_id_cookie()
{
    $chat_id = generate_unique_chat_id();
    setcookie('_chat_id', $chat_id, strtotime('+1 year'), '/');
}

/**
 * Новое правило редиректа
 *
 * @return void
 */
function add_rewrite_rule_go()
{
    add_rewrite_rule('^go/([^/]*)/?', 'index.php?go_redirect=$matches[1]', 'top');
    add_rewrite_tag('%go_redirect%', '([^&]+)');
}

/**
 * Добавляет правило обработки редиректа для мессенджера
 *
 * @return void
 */
function add_redirect_messenger()
{
    $redirect = get_query_var('go_redirect');

    if (! $redirect) {
        return;
    }

    add_filter('setting/whatsapp', function ($value) {
        $link = $value . '?text=' . urlencode('Номер обращения: ' . $_COOKIE['_chat_id']);
        return $link;
    });

    add_filter('setting/telegram', function ($value) {
        $link = $value . '?text=' . urlencode('Номер обращения: ' . $_COOKIE['_chat_id']);
        return $link;
    });

    $urls = [
        'whatsapp' => get_setting('whatsapp'),
        'telegram' => get_setting('telegram')
    ];

    $data = [
        'chat_id' => $_COOKIE['_chat_id'],
        'client_id' => $_COOKIE['_ym_uid'],
        'source' => $redirect,
        'utm_campaign' => get_utm('utm_campaign'),
        'utm_content' => get_utm('utm_content'),
        'utm_medium' => get_utm('utm_medium'),
        'utm_source' => get_utm('utm_source'),
        'utm_term' => get_utm('utm_term')
    ];

    if (isset($urls[$redirect])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'messanger_leads';
        $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO $table_name (chat_id, client_id, source, utm_campaign, utm_content, utm_medium, utm_source, utm_term)
                VALUES (%d, %s, %s, %s, %s, %s, %s, %s)
                ON DUPLICATE KEY UPDATE
                client_id = VALUES(client_id),
                source = VALUES(source),
                utm_campaign = VALUES(utm_campaign),
                utm_content = VALUES(utm_content),
                utm_medium = VALUES(utm_medium),
                utm_source = VALUES(utm_source),
                utm_term = VALUES(utm_term)",
                $data['chat_id'],
                $data['client_id'],
                $data['source'],
                $data['utm_campaign'],
                $data['utm_content'],
                $data['utm_medium'],
                $data['utm_source'],
                $data['utm_term']
            )
        );

        wp_redirect($urls[$redirect]);
        exit;
    } else {
        wp_redirect(home_url());
        exit;
    }
}

function get_redirect_messenger_link( $messenger = '' ) {
    $allow_messangers = [
        'whatsapp',
        'telegram'
    ];

    if( ! in_array( $messenger, $allow_messangers ) ) {
        return home_url();
    }

    return home_url( 'go/' . $messenger );
}

/**
 * Добавляет подменю в админке
 *
 * @return void
 */
function add_menu_admin_analytics()
{
    add_menu_page(
        'Аналитика',
        'Аналитика',
        'manage_options',
        'analytics',
        'output_analytics_messengers',
        'dashicons-chart-bar',
        40
    );

    $subpage_suffix = add_submenu_page(
        'analytics',
        'Загрузка данных',
        'Загрузка данных',
        'manage_options',
        'analytics-upload',
        'output_analytics_upload'
    );

    add_action('admin_enqueue_scripts', function ($hook) use ($subpage_suffix) {
        if ($hook == $subpage_suffix) {
            wp_enqueue_script(
                'analytics',
                get_template_directory_uri() . '/assets/js/analytics.min.js',
                [],
                filemtime(get_theme_file_path('/assets/js/analytics.min.js')),
                [
                    'in_footer' => true
                ]
            );

            wp_enqueue_style(
                'analytics',
                get_template_directory_uri() . '/assets/css/admin/analytics.css'
            );
        }
    });
}


function output_analytics_messengers()
{
    $args = [];

    include get_template_directory() . '/inc/modules/analytics/Analytics_Custom_Table.php';
    $table = new Analytics_Custom_Table();
    $table->prepare_items();

    $args['table'] = $table;

    get_template_part('template-parts/admin/analytics-messengers', null, $args);
}

function output_analytics_upload()
{
    $args = [
        'last_update' => get_option( 'last_update_chats' )
    ];

    get_template_part('template-parts/admin/analytics-upload', null, $args);
}

function ajax_load_metrika_chats()
{

    if (! isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        wp_send_json_error();
    }

    $tmp_path = $_FILES['file']['tmp_name'];

    $oauth_token = 'y0__xDDvb4oGPayPyDNsubtFvEssHjR_nHc2zryCVpQoaxzEd3C';
    $counter_id = 100407972;

    $endpoint = "https://api-metrika.yandex.net/management/v1/counter/{$counter_id}/offline_conversions/upload?type=CHATS&comment=October%20batch";

    $cfile = new CURLFile($tmp_path, 'text/csv', 'offline_chats.csv');

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $endpoint,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: OAuth ' . $oauth_token
        ],
        CURLOPT_POSTFIELDS => [
            'file' => $cfile
        ],
    ]);

    $response = curl_exec($ch);
    $response = json_decode( $response, 1 );

    if( isset( $response['errors'] ) ) {
        wp_send_json_error( ['error' => $response['errors'][0]['message']] );
    }

    if( curl_errno( $ch ) ) {
        wp_send_json_error( curl_error($ch) );
    }

    curl_close($ch);

    // Записываем дату закгрузки файла в БД
    update_option( 'last_update_chats', current_time('timestamp') );
    wp_send_json_success(['message' => 'Данные успешно загружены!']);
}
