<?php

if (wp_doing_ajax()) {
    add_action('wp_ajax_get_cdek_points', 'get_cdek_points');
    add_action('wp_ajax_nopriv_get_cdek_points', 'get_cdek_points');

    add_action('wp_ajax_send_dogovor', 'send_dogovor');
    add_action('wp_ajax_nopriv_send_dogovor', 'send_dogovor');

    function get_cdek_points()
    {
        if (empty($_POST)) {
            wp_send_json_error();
        }

        $city = json_decode(wp_unslash($_POST['city']), true);
        $city_id = get_cdek_city_id($city);

        if (! is_wp_error($city_id)) {

            $transient_key = 'cdek_points_city_' . $city_id;
            $transient = get_transient($transient_key);

            if ($transient) {
                wp_send_json_success(['list' => $transient]);
            }

            $token = get_access_cdek()['access_token'];

            $data = [
                'type' => 'PVZ',
                'city_code' => $city_id
            ];

            $headers = [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ];

            $url = 'https://api.cdek.ru/v2/deliverypoints?' . http_build_query($data);
            $response = wp_remote_get(
                $url,
                [
                    'headers' => $headers
                ]
            );

            if (is_wp_error($response)) {
                wp_send_json_error('Не удалось получить списов ПВЗ для');
            } else {
                $body = json_decode(wp_remote_retrieve_body($response), true);
                if (! empty($body['errors']) || ! empty($body['requests'])) {
                    wp_send_json_error('Не удалось получить списов ПВЗ');
                } else {
                    set_transient($transient_key, $body,  12 * HOUR_IN_SECONDS);
                    wp_send_json_success(['list' => $body]);
                }
            }
        }
    }

    function send_dogovor()
    {
        if (empty($_POST)) {
            wp_send_json_error();
        }

        $crm_url = get_url_crm('dogovor/kz.php');
        $crm_data = $_POST;
        $lead_data = $_POST;
        $crm_data['note'] = '';
        $subject = 'Заявка на заключение договора';
        $headers = get_headers_mail();
        $body = '';
        $body .= '<h3>Заявка на заключение договора</h3>';
        $email = get_email_manager();

        if (isset($_COOKIE['partner_id'])) {
            $lead_data['partner_id'] = intval($_COOKIE['partner_id']);
            $crm_data['partner_id'] = intval($_COOKIE['partner_id']);

            $users = get_users([
                'meta_key'   => 'partner_id',
                'meta_value' => $_COOKIE['partner_id'],
                'number'     => 1,
                'fields'     => 'ID',
            ]);

            if( ! empty( $users ) ) {
                $user_id = $users[0];
                $user_data = get_userdata( $user_id );
                $crm_data['partner_name'] = $user_data->first_name;
            }
        }

        $fields = [
            'person' => 'Лицо',
            'name' => 'Наименование/ФИО',
            'date_birth' => 'Дата рождения',
            'passport_number' => 'Серия и номер паспорта',
            'passport_date' => 'Дата выдачи паспорта',
            'passport_point' => 'Кем выдан паспорт',
            'passport_address' => 'Адрес регистрации',
            'inn' => 'ИНН',
            'address_legal' => 'Юридический адрес',
            'address_fact' => 'Фактический адрес',
            'number_license' => 'Номер свидетельства',
            'date_license' => 'Дата выдачи свидетельства',
            'bik' => 'БИК банка',
            'payment' => 'Расчетный счет',
            'fio_anketa' => 'ФИО заполнителя анкеты',
            'fio_director' => 'ФИО директора',
            'base_director' => 'Основания действий директора',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'link' => 'Ссылка интернет-магазина',
            'comments' => 'Комментарий',
            'point_city' => 'Город возврата посылок',
            'point_address' => 'Адрес возврата посылок'
        ];

        foreach ($fields as $index => $label) {
            if (!empty($_POST[$index])) {
                $body .= '<p style="margin: 4px 0"><b>' . $label . ':</b> ' . stripcslashes($_POST[$index]) . '</p>';
                $crm_data['note'] .= $label . ': ' . stripcslashes($_POST[$index]) . PHP_EOL;
            }
        }

        // Добавляем лид в админке
        $post_id_lead = add_lead($lead_data);

        // Отправляем данные в СРМ
        $crm_data['title'] = $subject;
        $crm_data['site'] = home_url();
        $crm_lead = send_data($crm_url, $crm_data);

        // Лиду в админке добавляем ID из СРМ
        if( $post_id_lead && isset( $crm_lead['lead'] ) ) {
            update_field( 'lead', [ 'lead_id' => $crm_lead['lead']['id'] ], $post_id_lead );
        }

        // Отправляем на почту
        if (!empty($email)) {
            $result = wp_mail($email, $subject, $body, $headers);
        }

        if ($result) {
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }
}
