<?php

if (wp_doing_ajax()) {
    add_action('wp_ajax_calculation', 'calculation');
    add_action('wp_ajax_nopriv_calculation', 'calculation');

    function calculation()
    {
        $from = json_decode(wp_unslash($_POST['from']), true);
        $to = json_decode(wp_unslash($_POST['to']), true);
        $packages = json_decode(wp_unslash($_POST['packages']));

        $from_id =  get_cdek_city_id($from);
        $to_id = get_cdek_city_id($to);

        if (! is_wp_error($from_id) && ! is_wp_error($to_id)) {
            $token = get_access_cdek()['access_token'];

            $headers = [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ];

            $data = [
                'from_location'  => array(
                    'code' => $from_id
                ),
                'to_location'  => array(
                    'code' => $to_id
                ),
                'currency' => 1,
                'packages' => $packages
            ];

            $response = wp_remote_post(
                'https://api.cdek.ru/v2/calculator/tarifflist',
                [
                    'headers' => $headers,
                    'body' => wp_json_encode($data)
                ]
            );

            if( ! is_wp_error( $response ) ) {
                $body = json_decode( wp_remote_retrieve_body( $response ), true );

                if (isset($body['errors'])) {
                    wp_send_json_error( $body['errors'][0]['message'] );
                } else {
                    wp_send_json_success($body);
                }
            } else {
                wp_send_json_error( 'Не удалось выполнить расчет стоиомсти. Повторите снова или позвоните нам ' . get_setting('phone')  );
            }
        }
    }

}
