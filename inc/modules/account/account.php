<?php

add_action('init', 'account_wp_rewrite');
add_filter('query_vars', 'account_register_query_vars');
add_action('wp_ajax_nopriv_account_login', 'ajax_account_login');
add_action('wp_ajax_nopriv_account_register', 'ajax_account_register');
add_action('wp_ajax_account_settings', 'ajax_account_settings');
add_action('after_setup_theme', 'admin_bar_hide_cdek_role');
add_action('init', 'wp_admin_block_cdek_role');
add_action('rest_api_init', 'register_qr_route');
add_action('init', 'register_post_type_lead');
add_filter('wpseo_robots', 'set_noindex_account_pages');
add_action('after_setup_theme', 'create_custom_lead_stats_table');

function account_wp_rewrite()
{
    add_rewrite_rule(
        '^account/?$',
        'index.php?pagename=account',
        'top'
    );

    add_rewrite_rule(
        '^account/([^/]+)/?$',
        'index.php?pagename=account&account_section=$matches[1]',
        'top'
    );

    add_rewrite_rule(
        '^account/leads/([0-9]+)/?$',
        'index.php?pagename=account&account_section=leads&lead_id=$matches[1]',
        'top'
    );
}

function account_register_query_vars($vars)
{
    $vars[] = 'account_section';
    $vars[] = 'lead_id';
    return $vars;
}

function admin_bar_hide_cdek_role()
{
    if (is_user_logged_in() && (current_user_can('cdek_partner') || current_user_can('cdek_admin'))) {
        show_admin_bar(false);
    }
}

function wp_admin_block_cdek_role()
{
    if (
        is_admin() &&
        is_user_logged_in() &&
        (current_user_can('cdek_partner') || current_user_can('cdek_admin')) &&
        !wp_doing_ajax()
    ) {
        wp_safe_redirect(home_url('/account/'));
        exit;
    }
}

function account_page()
{
    wp_enqueue_script('account');

    $account_section = get_query_var('account_section');

    if (empty($account_section)) {
        if (! is_user_logged_in()) {
            get_template_part('template-parts/account/login');
        } else {
            get_template_part('template-parts/account/main');
        }
    } else if ($account_section == 'logout') {
        wp_logout();
        wp_safe_redirect(home_url('account'));
    } else if ($account_section == 'register') {
        get_template_part('template-parts/account/register');
    } else {
        get_template_part('template-parts/account/main');
    }
}

function ajax_account_login()
{
    if (empty($_POST)) {
        wp_send_json_error(['message' => 'Не указаны данные для входа']);
    }

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $login_data = [
            'user_login' => $_POST['email'],
            'user_password' => $_POST['password']
        ];

        if (isset($_POST['rememberme'])) {
            $login_data['remember'] = true;
        }

        $sign = wp_signon($login_data);

        if (is_wp_error($sign)) {
            wp_send_json_error(['message' => $sign->get_error_message()]);
        }

        wp_send_json_success();
    }
}

function ajax_account_register()
{
    if (empty($_POST)) {
        wp_send_json_error(['message' => 'Не указаны данные для регистрации']);
    }

    if (! check_ajax_referer('account_register')) {
        wp_send_json_error(['message' => 'Ошибка при регистрации']);
    }

    // Уникальный ID партнера
    $partner_id = generate_unique_partner_id();

    $user_data = [
        'user_login' => 'partner_' . $partner_id,
        'role' => 'cdek_partner',
        'meta_input' => []
    ];

    if (! is_email($_POST['email'])) {
        wp_send_json_error(['message' => 'Указан неверный e-mail.']);
    }

    if (! empty($_POST['name'])) {
        $user_data['first_name'] = $_POST['name'];
    }

    if (! empty($_POST['email'])) {
        $user_data['user_email'] = $_POST['email'];
    }

    if (! empty($_POST['password'])) {
        $user_data['user_pass'] = $_POST['password'];
    }

    if (! empty($_POST['city'])) {
        $user_data['meta_input']['city'] = $_POST['city'];
    }

    if (! empty($_POST['answer'])) {
        $user_data['description'] = $_POST['answer'];
    }

    $user_data['meta_input']['partner_id'] = $partner_id;

    $user = wp_insert_user($user_data);

    if (is_wp_error($user)) {
        wp_send_json_error(['message' => $user->get_error_message()]);
    }

    $success_message = sprintf('Вы успешно зарегистрировались в партнерской программе. Теперь вы можете зайти в <a href="%s">личный кабинет</a>.', home_url('/account/'));

    if (is_email($_POST['email'])) {
        $user_info = get_userdata($user);
        $message = '<h3>Регистрация в партнерской программе i-cdek.ru</h3>';
        $message .= '<p style="margin: 4px 0;">Вы успешно зарегистрировались в партнерской программе i-cdek.ru.</p>';
        $message .= '<h3 style="margin: 4px 0;">Данные для авторизации:</h3>';
        $message .= '<p style="margin: 4px 0;"><strong>Логин:</strong> ' . $user_info->user_login . ' </p>';
        $message .= '<p style="margin: 4px 0;"><strong>E-mail:</strong> ' . $user_info->user_email . ' </p>';
        $message .= '<p style="margin: 4px 0;"><strong>Пароль:</strong> <i>Указан при регистрации</i></p>';
        $message .= '<p style="margin: 16px 0;"><a href="' . home_url('/account/') . '">Войти в личный кабинет</a></p>';
        $headers = get_headers_mail();

        wp_mail($_POST['email'], 'Регистрация в партнерской программе i-cdek.ru', $message, $headers);
    }

    wp_send_json_success(['message' => $success_message]);
}

function is_account_page()
{
    return is_page('account') && is_user_logged_in();
}

function is_account_current_page($path)
{
    $uri  = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $path = trim($path, '/');

    if ($uri === $path) {
        return true;
    }

    return false;
}

function generate_unique_partner_id($length = 5)
{

    $meta_key = 'partner_id';
    $min = (int) pow(10, $length - 1);
    $max = (int) pow(10, $length) - 1;

    do {
        $partner_id = (string) random_int($min, $max);

        $users = get_users([
            'meta_key'   => $meta_key,
            'meta_value' => $partner_id,
            'number'     => 1,
            'fields'     => 'ID',
        ]);
    } while (!empty($users));

    return $partner_id;
}

function get_partner_id($user_id = 0)
{
    if ($user_id) {
        $partner_id = get_user_meta($user_id, 'partner_id', true);

        return $partner_id;
    }

    return false;
}

function get_partner_link($user_id = 0)
{
    if ($user_id) {
        $partner_id = get_partner_id($user_id);

        if ($partner_id) {
            return add_query_arg('partner', $partner_id, home_url('/'));
        }
    }

    return false;
}

function register_qr_route()
{
    register_rest_route('partner/v1', '/qr', [
        'methods'  => 'GET',
        'callback' => 'generate_qr_code',
        'permission_callback' => '__return_true',
        'args' => [
            'url' => [
                'required' => true,
                'type' => 'string',
                'sanitize_callback' => 'esc_url_raw',
            ]
        ]
    ]);
}

function generate_qr_code(WP_REST_Request $request)
{
    include get_template_directory() . '/inc/vendor/autoload.php';
    $url = esc_url($request->get_param('url'));

    if (empty($url)) {
        return new WP_REST_Response([
            'error' => 'link is required'
        ], 400);
    }

    try {
        $result = Endroid\QrCode\Builder\Builder::create()
            ->writer(new Endroid\QrCode\Writer\PngWriter())
            ->data($url)
            ->size(200)
            ->margin(0)
            ->build();

        header('Content-Type: ' . $result->getMimeType());
        header('Content-Disposition: inline; filename="qr_partner_link.png"');
        echo $result->getString();
        exit;
    } catch (Exception $e) {
        return new WP_REST_Response([
            'error' => $e->getMessage()
        ], 500);
    }
}

function register_post_type_lead()
{
    $labels = array(
        'name'               => 'Лиды',
        'singular_name'      => 'Лид',
        'menu_name'          => 'Лиды',
        'name_admin_bar'     => 'Лид',
        'add_new'            => 'Добавить лид',
        'add_new_item'       => 'Новый лид',
        'new_item'           => 'Новый лид',
        'edit_item'          => 'Редактировать лид',
        'view_item'          => 'Просмотреть лид',
        'all_items'          => 'Все лиды',
        'search_items'       => 'Поиск лидов',
        'not_found'          => 'Лиды не найдены',
        'not_found_in_trash' => 'В корзине лидов нет',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-id',
        'supports'           => array('title', 'editor'),
        'has_archive'        => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false
    );

    register_post_type('lead', $args);
}

function get_permission_lead()
{
    $lead_id = get_query_var('lead_id');
    $lead_data = get_field('lead', $lead_id);
    $user_id = get_current_user_id();

    if (current_user_can('cdek_admin') || current_user_can('administrator')) {
        return true;
    }

    if (current_user_can('cdek_partner') && isset($lead_data['partner']) && $lead_data['partner'] == $user_id) {
        return true;
    }

    return false;
}

function set_404_status($wp)
{
    $lead_id = get_query_var('lead_id');
    $account_section = get_query_var('account_section');

    if (is_account_page() && $account_section == 'leads' && ! empty($lead_id)) {
        global $wp_query;

        // Нет такого лида
        $leads = get_posts([
            'post_type' => 'lead',
            'p' => $lead_id,
            'posts_per_page' => 1,
            'fields' => 'ids'
        ]);

        // Не разрешено просматривать лид
        if (! get_permission_lead() || empty($leads)) {
            $wp_query->set_404();
            status_header(404);
        }
    }
}

function ajax_account_settings()
{

    if (! is_user_logged_in()) {
        wp_send_json_error(['message' => 'Пользователь не авторизован.']);
    }

    if (empty($_POST)) {
        wp_send_json_error(['message' => 'Нет данных для обновления.']);
    }

    if (! check_ajax_referer('account_settings', false, false)) {
        wp_send_json_error(['message' => 'Ошибка при обновлении данных.']);
    }

    $user_id = get_current_user_id();
    $user = wp_get_current_user();

    if (empty($_POST['user_email'])) {
        wp_send_json_error(['message' => 'E-mail не может быть пустым.']);
    }

    if (! is_email($_POST['user_email'])) {
        wp_send_json_error(['message' => 'Указан неверный e-mail.']);
    }

    if (empty($_POST['display_name'])) {
        wp_send_json_error(['message' => 'ФИО не может быть пустым.']);
    }

    $user_data = [
        'ID' => $user_id,
        'user_email' => $_POST['user_email'],
        'display_name' => $_POST['display_name']
    ];

    // Обновление пользователя
    $update = wp_update_user($user_data);

    // Обновление города
    if (! empty($_POST['city'])) {
        update_user_meta($user_id, 'city', sanitize_text_field($_POST['city']));
    }

    // Смена пароля
    if (! empty($_POST['new_password'])) {
        $current_password = $_POST['old_password'] ?? '';
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'] ?? '';

        // Проверка текущего пароля
        if (!wp_check_password($current_password, $user->user_pass, $user_id)) {
            wp_send_json_error(['message' => 'Текущий пароль указан неверно.']);
        }

        // Проверка совпадения новых паролей
        if ($new_password !== $confirm_password) {
            wp_send_json_error(['message' => 'Новые пароли не совпадают.']);
        }

        // Смена пароля
        wp_set_password($new_password, $user_id);

        // Повторная авторизация
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);

        if (! is_wp_error($update)) {
            wp_send_json_success(['message' => 'Данные и пароль успешно изменены.', 'reload' => true]);
        }
    }

    if (! is_wp_error($update)) {
        wp_send_json_success(['message' => 'Данные успешно изменены.']);
    }

    wp_send_json_error(['message' => $update->get_error_message()]);
}

function set_noindex_account_pages($robots)
{
    if (is_page('account')) {
        return 'noindex, nofollow';
    }

    return $robots;
}

function create_custom_lead_stats_table()
{
    global $wpdb;

    $table = 'lead_stats';
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
        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
        lead_id BIGINT UNSIGNED NOT NULL,
        period DATE NOT NULL,
        amount DECIMAL(10,2) NOT NULL DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY lead_period (lead_id, period),
        KEY lead_id (lead_id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Обновляем версию таблицы
    update_option($option_name, $version_table);
}


function get_partner_stats($partner_id)
{
    $stats = [
        'summ_clients' => 0,
        'prev_clients' => 0,
        'current_clients' => 0,
        'prev_month_profit' => 0,
        'summ_profit' => 0
    ];

    $args = [
        'post_type' => 'lead',
        'meta_key' => 'lead_partner',
        'meta_value' => $partner_id,
        'posts_per_page' => -1,
        'fields' => 'ids'
    ];

    $leads_count_prev = get_posts(
        wp_parse_args([
            'date_query' => [
                'after' => 'first day of last month',
                'before' => 'last day of last month',
                'inclusive' => true
            ],
            'no_found_rows' => true
        ], $args)
    );

    $leads_count_current = get_posts(
        wp_parse_args([
            'date_query' => [
                'after' => 'first day of this month',
                'before' => 'last day of this month',
                'inclusive' => true
            ],
            'no_found_rows' => true
        ], $args)
    );

    $leads = get_posts([
        'post_type' => 'lead',
        'meta_key' => 'lead_partner',
        'meta_value' => $partner_id,
        'posts_per_page' => -1,
        'fields' => 'ids'
    ]);

    if (! empty($leads)) {
        global $wpdb;
        $table = $wpdb->prefix . 'lead_stats';

        $ids = array_map('intval', $leads);
        $placeholders = implode(',', array_fill(0, count($ids), '%d'));

        $query = $wpdb->prepare(
            "SELECT lead_id, period, amount
             FROM $table
             WHERE lead_id IN ($placeholders)
             ORDER BY period",
            $ids
        );

        $results = $wpdb->get_results($query);

        if (! empty($results)) {
            $current_month = date('Y-m');
            $prev_month = date('Y-m', strtotime('-1 month'));
            $summ_profit = 0;
            $prev_month_profit = 0;

            foreach ($results as $row) {
                $month = date('Y-m', strtotime($row->period));
                $summ_profit += (float) $row->amount;

                if ($month == $prev_month) {
                    $prev_month_profit += (float) $row->amount;
                }
            }

            $stats['prev_month_profit'] = $prev_month_profit;
            $stats['summ_profit'] = $summ_profit;
        }

        $stats['summ_clients'] = count($leads);
        $stats['prev_clients'] = count($leads_count_prev);
        $stats['current_clients'] = count($leads_count_current);
    }
    return $stats;
}

get_partner_stats(12);
