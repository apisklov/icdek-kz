<?php

if (wp_doing_ajax()) {
    add_action('wp_ajax_send_form', 'send_form');
    add_action('wp_ajax_nopriv_send_form', 'send_form');

    function send_form()
    {
        if (! isset($_POST)) {
            wp_send_json_error();
        }

        $crm_url = get_url_crm('form/kz.php');
        $crm_data = $_POST;
        $crm_note = '';
        $subject = (! empty( $_POST['subject'] )) ? $_POST['subject'] : 'Заявка с сайта i-cdek.ru';
        $headers = get_headers_mail();
        $body = '<h3>'.$subject.'</h3>';
        $email = get_email_manager();

        $fields = [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'marketplace' => 'Маркетплейс',
            'other_marketplace' => 'Другой маркетплейс'
        ];

        foreach( $fields as $index => $label ) {
            if( ! empty( $_POST[$index] ) ){
                if( $index == 'packages' ){
                    $body .= '<br><p style="margin: 4px 0"><b>'.$label.':</b></p>';
                    $crm_note .= PHP_EOL . $label . PHP_EOL;
                } else {
                    $body .= '<p style="margin: 4px 0"><b>'.$label.':</b> '.$_POST[$index].'</p>';
                    $crm_note .= $label . ': ' . $_POST[$index] . PHP_EOL;
                }
            }
        }

        // Отправка в СРМ
        $crm_data['title'] = $subject;
        $crm_data['note'] = $crm_note;
        $crm_data['site'] = home_url();
        send_data( $crm_url, $crm_data );

        // Отправляем на почту
        if( !empty($email) ){
			$result = wp_mail($email, $subject, $body, $headers);
		}

        if( $result ){
			wp_send_json_success();
		} else {
			wp_send_json_error();
		}

    }
}
