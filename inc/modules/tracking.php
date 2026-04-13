<?php

add_shortcode('tracking', 'output_shortcode_tracking');

function output_shortcode_tracking()
{
    wp_enqueue_script('tracking');
    ob_start();
    get_template_part('template-parts/element/tracking');
    return ob_get_clean();
}

if (wp_doing_ajax()) {
    add_action('wp_ajax_tracking', 'tracking');
    add_action('wp_ajax_nopriv_tracking', 'tracking');

    function tracking()
    {

        if (empty($_POST['invoice'])) {
            wp_send_json_error('Не указан номер накладной');
        }

        $token = get_access_cdek()['access_token'];

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ];

        $args = [
            'cdek_number' => $_POST['invoice'],
        ];

        $response = wp_remote_get(
            'https://api.cdek.ru/v2/orders?' . http_build_query($args),
            [
                'headers' => $headers
            ]
        );

        if (is_wp_error($response)) {
            wp_send_json_error('Не удалось получить информацию по заказу ' . $_POST['invoice']);
        } else {
            $body = wp_remote_retrieve_body($response);
            $body = json_decode( $body, true );

            if (isset($body['errors']) || isset($body['requests']) && isset($body['requests'][0]['errors'])) {
                wp_send_json_error('Не удалось получить информацию по заказу ' . $_POST['invoice']);
            }

            wp_send_json_success($body['entity']);
        }
    }
}
