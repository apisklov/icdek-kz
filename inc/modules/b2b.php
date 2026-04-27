<?php

if (wp_doing_ajax()) {

    add_action('wp_ajax_send_b2b_dogovor', 'send_b2b_dogovor');
    add_action('wp_ajax_nopriv_send_b2b_dogovor', 'send_b2b_dogovor');

    function send_b2b_dogovor()
    {
        if (empty($_POST)) {
            wp_send_json_error();
        }

        $crm_url = get_url_crm('dogovor/');
        $crm_data = $_POST;
        $crm_data['note'] = '';
        $subject = 'Заявка на B2B-доставку';
        $headers = get_headers_mail();
        $body = '';
        $body .= '<h3>Заявка на B2B-доставку</h3>';
        $email = get_email_manager();
        $files = [];

        $fields = [
            'country_departure' => 'Страна отправления',
            'address_departure' => 'Адрес отправителя',
            'country_destination' => 'Страна назначения',
            'address_destination' => 'Адрес получателя',
            'target' => 'Цель транспортировки',
            'name' => 'ФИО контактного лица',
            'email' => 'E-mail контактного лица',
            'phone' => 'Телефон контактного лица',
            'company' => 'Наименование компании',
            'inn' => 'БИН/ИИН',
            'desc' => 'Описание товара',
            'link' => 'Ссылка на товар в интернете',
            'price' => 'Стоимость',
            'data_contact' => 'Контактные данные',
            'type' => 'Вы являетесь',
            'type_delivery' => 'Тип доставки',
            'qty' => 'Количество',
            'weight' => 'Вес, кг',
            'sizes' => 'Габариты, ДхШхВ в см',
            'comment' => 'Комментарий'
        ];

        foreach ($fields as $index => $label) {
            if (!empty($_POST[$index])) {
                $body .= '<p style="margin: 4px 0"><b>' . $label . ':</b> ' . stripcslashes($_POST[$index]) . '</p>';
                $crm_data['note'] .= $label . ': ' . stripcslashes($_POST[$index]) . PHP_EOL;
            }
        }

        if (! empty($_FILES['file'])) {
            $uploaded_file = $_FILES['file'];
            // Подключаем нужные функции WP
            require_once(ABSPATH . 'wp-admin/includes/file.php');

            $upload_overrides = ['test_form' => false];

            $movefile = wp_handle_upload($uploaded_file, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {
                $file_path = $movefile['file']; // полный путь к файлу
                $files[] = $file_path;
            }
        }

        // Отправляем данные в СРМ
        $crm_data['title'] = $subject;
        $crm_data['site'] = home_url();
        send_data($crm_url, $crm_data);

        // Отправляем на почту
        if (!empty($email)) {
            $result = wp_mail($email, $subject, $body, $headers, $files);
        }

        if ($result) {
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }
}
